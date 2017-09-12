<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $asin
 * @property string $title
 * @property double $price
 * @property string $picture
 * @property string $EAN
 * @property string $Brand
 * @property string $currency_code
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asin', 'title', 'price', 'EAN'], 'required'],
            [['price'], 'number'],
            [['asin'], 'string', 'max' => 10],
            [['title', 'picture', 'EAN', 'Brand'], 'string', 'max' => 255],
            [['currency_code'], 'string', 'max' => 3],
            [['asin'], 'unique'],
            [['EAN'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asin' => 'Asin',
            'title' => 'Title',
            'price' => 'Price',
            'picture' => 'Picture',
            'EAN' => 'Ean',
            'Brand' => 'Brand',
            'currency_code' => 'Currency Code',
        ];
    }
}
