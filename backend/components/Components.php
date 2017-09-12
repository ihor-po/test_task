<?php
namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Components extends Component
{
    /*
     * Get product info in Amazon
     * */
    public function getItemInfo($isbn, $access_key, $secure_access_key)
    {
        $fields = array();
        $fields['Service'] = 'AWSECommerceService';
        $fields['AWSAccessKeyId'] = $access_key;
        $fields['AssociateTag'] = 'bridge-rating-21';
        $fields['Operation'] = 'ItemLookup';
        $fields['ItemId'] = $isbn;
        $fields['IdType'] = 'ASIN';
        $fields['ResponseGroup'] = 'Large';
        $fields['Condition'] = 'All';
        $fields['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
        $fields['MerchantId'] = 'Amazon';

        ksort($fields);

        $query = array();
        foreach ($fields as $key=>$value) {
            $query[] = "$key=" . urlencode($value);
        }

        $string = "GET\nwebservices.amazon.de\n/onca/xml\n" . implode('&', $query);
        $signed = urlencode(base64_encode(hash_hmac('sha256', $string, $secure_access_key, true)));

        $url = 'http://webservices.amazon.de/onca/xml?' . implode('&', $query) . '&Signature=' . $signed;

        $res = curl_init();
        curl_setopt($res, CURLOPT_URL, $url);
        curl_setopt($res, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($res, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($res);
        $info = curl_getinfo($res);

        if ($info['http_code'] != '200') return false;

        $xml = simplexml_load_string($data);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);

        if (!isset($data['Items']['Request']['Errors'])) {

            $itemInfo = array(
                'id' => '',
                'asin' => '',
                'title' => '',
                'itemPrice' => array(
                    'price' => '',
                    'currencyCode' => ''
                ),
                'image' => '',
                'ean' => '',
                'brand' => ''
            );

            if (isset($data['Items']['Item']['ASIN']) && !empty($data['Items']['Item']['ASIN'])) {
                $itemInfo['asin'] = $data['Items']['Item']['ASIN'];
            }

            if (isset($data['Items']['Item']['ItemAttributes']['Title']) && !empty($data['Items']['Item']['ItemAttributes']['Title'])) {
                $itemInfo['title'] = $data['Items']['Item']['ItemAttributes']['Title'];
            }

            if (isset($data['Items']['Item']['Offers']['Offer']['OfferListing']['Price']['Amount']) &&
                !empty($data['Items']['Item']['Offers']['Offer']['OfferListing']['Price']['Amount'])) {
                $itemInfo['itemPrice'] = array(
                    'price' => $data['Items']['Item']['Offers']['Offer']['OfferListing']['Price']['Amount'] / 100,
                    'currencyCode' => $data['Items']['Item']['Offers']['Offer']['OfferListing']['Price']['CurrencyCode']
                );
            } else if (isset($data['Items']['Item']['OfferSummary']['LowestNewPrice']['Amount']) && !empty($data['Items']['Item']['OfferSummary']['LowestNewPrice']['Amount'])) {
                $itemInfo['itemPrice'] = array(
                    'price' => $data['Items']['Item']['OfferSummary']['LowestNewPrice']['Amount'] / 100,
                    'currencyCode' => $data['Items']['Item']['OfferSummary']['LowestNewPrice']['CurrencyCode']
                );
            } else {
                $itemInfo['itemPrice'] = array(
                    'price' => 0,
                    'currencyCode' => ''
                );
            }

            if (isset($data['Items']['Item']['SmallImage']['URL']) && !empty($data['Items']['Item']['SmallImage']['URL'])) {
                $itemInfo['image'] = $data['Items']['Item']['SmallImage']['URL'];
            }

            if (isset($data['Items']['Item']['ItemAttributes']['EAN']) && !empty($data['Items']['Item']['ItemAttributes']['EAN'])) {
                $itemInfo['ean'] = $data['Items']['Item']['ItemAttributes']['EAN'];
            }

            if (isset($data['Items']['Item']['ItemAttributes']['Brand']) && !empty($data['Items']['Item']['ItemAttributes']['Brand'])) {
                $itemInfo['brand'] = $data['Items']['Item']['ItemAttributes']['Brand'];
            }

        }
        else
        {
            $itemInfo['error'] =  $data['Items']['Request']['Errors']['Error']['Message'];
        }
        return $itemInfo;
    }

}