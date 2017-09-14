<?php
/* @var $this yii\web\View */
?>
<div class="banner-container">
    <img src="img/baner.png">
    <div class="search-block">
        <form id="product-search" class="form-inline" method="post" action="index">
            <div class="form-group">
                <input class="form-control" type="text" id="search" name="search" placeholder="galaxy s7">
            </div>
            <button type="submit" class="btn btn-success btn-lg">SUCHEN</button>
        </form>
    </div>
</div>
<div class="filter-top-conteiner row">
    <div class="left-side col-lg-6">
        <p>880 Ergebnisse fur <span>"galaxy s7"</span></p>
    </div>
    <div class="right-side col-lg-6">
        <a><span class="glyphicon glyphicon-th-list active" aria-hidden="true"></span></a>
        <a><span class="glyphicon glyphicon-th" aria-hidden="true"></span></a>
        <p>Vergleichen</p>
    </div>
</div>
<div class="filter-bottom-conteiner row">
    <div class="left-side col-lg-6">
        <p>Filtern nach:
            <span class="filter-text">GALAXY<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
            <span class="filter-text">S7<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
            <span class="filter-text">Alles entfernen</span>
        </p>
    </div>
    <div class="right-side col-lg-6">
        <select class="js-example-basic-single" name="select-input">
            <option value="Relevanz">Relevanz</option>
            <option value="Top">Bewertung(Top)</option>
            <option value="Flop">Bewertung(Flop)</option>
            <option value="Anzahl">Anzahl an Bewertungen</option>
        </select>
    </div>
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
                    <img src="img/stars.png">
                 </div>
                 <div class="item-price">
                 <div class="top-block">SEHR GUT</div>
                 <p>' . $product->price . ' ' . '€' . '</p>
                 <div class="bottom-block">SOME TEXT</div>
                 </div>
                <div class="item-unknow">
                    <div class="lines">
                        <div class="line-une">50 <i class="fa fa-comment-o" aria-hidden="true"></i></div>
                        <div class="line-deux">Display</div>
                    </div>
                    <div class="lines">
                        <div class="line-une">15 <i class="fa fa-comment-o" aria-hidden="true"></i></div>
                        <div class="line-deux">Kamera</div>
                    </div>
                    <div class="lines">
                        <div class="line-une">4 <i class="fa fa-comment-o" aria-hidden="true"></i></div>
                        <div class="line-deux">Akku</div>
                    </div>
                    <p><a href="#">Lorem ipsum dolor sit amet</a></p>                                        
                 </div>
            </div>';
    ?>
</div>