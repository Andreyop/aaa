<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\bootstrap4\LinkPager;
use yii\widgets\ListView;

$this->title = 'Po-polam';
?>

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Home  </a><span>  |  </span></li>
                        <li>All products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?=  $this->render('/layouts\inc\sidebar') ?>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <!-- toolbar start -->
    <div class="toolbar">
        <div class="show-result">
            <p> Showing 1–<? echo $count = $dataProvider->getCount();?> of <? echo $totalCount = $dataProvider->getTotalCount();?> results</p>
        </div>
        <div class="toolbar-form">
            <form action="#">
                <div class="tolbar-select">
                    <select>
                        <option value="volvo">Sort by popularity</option>
                        <option value="saab">Default sorting</option>
                        <option value="mercedes">Sort by average rating</option>
                        <option value="audi">Sort by newness</option>
                        <option value="audi">Sort by price: low to high</option>
                        <option value="audi">Sort by price: high to low</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <!-- toolbar end -->

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '<div class="row">{items}</div>{pager}',
        'itemView' => '_product_item',
        'itemOptions' => [

            'class' => 'col-lg-4 col-md-6 mb-4  single-product',

        ],

        'pager' => [

            'options' => ['class' => 'pagination','style' => 'color: #777'],
            'linkOptions' => ['class' => 'row', 'style' => ' background-color: #0000'],
            'disabledPageCssClass' => 'shop-pagination',
            'class' => LinkPager::class
        ]
    ]) ?>














            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->
<!-- brand-area start -->
<div class="brand-area pad-60">
    <div class="container">
        <!-- section-heading start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h3>Our Brands</h3>
                    <div class="title-icon">
                        <span><i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- section-heading end -->
        <div class="row">
            <div class="brand-curosel">
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt="" /></a>
                    </div>
                </div>
                <!-- single-brand end -->
            </div>
        </div>
    </div>
</div>
<!-- brand-area end -->



