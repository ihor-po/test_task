<?php
/* @var $this yii\web\View */
?>
<div class="new-container">
    <p>Banner</p>
</div>
<div class="products-div">
    <?foreach ($products as $product)
       echo '<div class="item-info">
                <div class="item-image">
                    <div>
                        <img src="'. $product->picture.'" alt="no image">
                    </div>
                 </div>
                 <div class="brand-title">
                    <p>' . $product->title . '</p>
                    <p>' . $product->Brand . '</p>
                    <img src="stars.png">
                 </div>
                 <div class="item-price">
                 <div class="top-block">SOME TEXT</div>
                 <p>' . $product->price . ' ' . $product->currency_code . '</p>
                 <div class="bottom-block">SOME TEXT</div>
                 </div>
                <div class="item-unknow">
                    <div class="lines">
                        <div class="line-une"></div>
                        <div class="line-deux"></div>
                    </div>
                    <div class="lines">
                        <div class="line-une"></div>
                        <div class="line-deux"></div>
                    </div>
                    <div class="lines">
                        <div class="line-une"></div>
                        <div class="line-deux"></div>
                    </div>
                    <p><a href="#">Lorem ipsum dolor sit amet</a></p>                                        
                 </div>
            </div>'
    ?>
</div>