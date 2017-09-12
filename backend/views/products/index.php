<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('/js/product.js');
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'asin',
            'title',
            'price',
            'picture',
             'EAN',
             'Brand',
             'currency_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::Button('Add new product', ['class' => 'btn btn-info btn-lg', 'data-toggle' => 'modal', 'data-target' => '#asinModal']) ?>
    <?= Html::submitButton('Load products info', ['class' => 'btn btn-warning btn-lg info-hide pull-right', 'form' => 'saveProductForm', 'id' => 'loadProductInfo']) ?>
    <?= Html::beginForm('save-product-info', 'post', ['class' => 'form-horizontal info-hide', 'id' => 'saveProductForm']) ?>
    <?=Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
    <div class="form-group row">
        <label class="col-lg-offset-3 col-lg-2 control-label">ID</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="idProduct" id="idProduct"></p>
            <input type="hidden" id="idProductInput" name="idProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">ASIN</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="asinProduct" id="asinProduct"></p>
            <input type="hidden" id="asinProductInput" name="asinProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">Title</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="titleProduct" id="titleProduct"></p>
            <input type="hidden" id="titleProductInput" name="titleProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">Price</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="priceProduct" id="priceProduct"></p>
            <input type="hidden" id="priceProductInput" name="priceProductInput">
            <input type="hidden" id="currencyCodeProductInput" name="currencyCodeProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">Picture</label>
        <div class="col-lg-7">
            <img src="" id="pictureProduct" alt="No picture">
            <input type="hidden" id="pictureProductInput" name="pictureProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">EAN</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="eanProduct" id="eanProduct"></p>
            <input type="hidden" id="eanProductInput" name="eanProductInput">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-offset-3 col-lg-2 control-label">Brand</label>
        <div class="col-lg-7">
            <p class="form-control-static" name="brandProduct" id="brandProduct"></p>
            <input type="hidden" id="brandProductInput" name="brandProductInput">
        </div>
    </div>
    <?= Html::endForm() ?>
</div>

<div id="asinModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Add new product</h4>
            </div>
            <div class="modal-body">
                <?= Html::beginForm(NULL, 'get', ['class' => 'form-inline row', 'id' => 'form-amazon']) ?>
                    <div class="form-group col-lg-offset-3">
                        <?= Html::label('ASIN', 'asinProduct', ['class' => '']) ?>
                        <?= Html::Input('text', 'asinProduct', '', ['class' => 'form-control ', 'id' => 'asinProduct']) ?>
                        <?= Html::submitButton('Add product', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?= Html::endForm() ?>
            </div>
            <div class="modal-footer">
                <?= Html::Button('Close', ['class' => 'btn  btn-default', 'data-dismiss' => 'modal']) ?>
            </div>
        </div>
    </div>
</div>