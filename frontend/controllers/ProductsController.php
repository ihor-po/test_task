<?php

namespace frontend\controllers;

use frontend\models\Products;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $products = Products::find()->select('asin, title,price, currency_code, Brand, picture')->all();

        return $this->render('index', compact('products'));
    }

}