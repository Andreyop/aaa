<?php

/* @var $this yii\web\View */

/** @var \yii\data\ActiveDataProvider $dataProvider */

use frontend\components\BrandsWidget;
use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Po-polam';
?>

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a
                                    href="<?= \yii\helpers\Url::home() ?>">Home </a><span>  |  </span></li>
                        <li>All products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blog-area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <!-- shop-left-sidebar start -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <!-- widget-categories start -->
                <aside class="widget widget-categories">
                    <!--                <aside class="widget widget-categories" >-->
                    <h3 class="sidebar-title">Categories</h3>
                    <div class="mainmenu">
                        <ul class="sidebar-menu">
                            <?= frontend\components\MenuWidget::widget([
                                'tpl' => 'menu',
                                'ul_class' => 'sub-menu',
                            ]) ?>
                        </ul>
                </aside>
                <aside class="widget widget-categories">
                    <!--                <aside class="widget widget-categories" >-->
                    <h3 class="sidebar-title">Brands</h3>
                    <div class="mainmenu">
                        <ul class="sidebar-menu">
                            <?= BrandsWidget::widget(); ?>
                        </ul>
                </aside>

                <!-- shop-filter start -->
                <aside class="widget shop-filter">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0"/>
                    <input type="hidden" id="hidden_maximum_price" value="65000"/>
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </aside>
                <!-- shop-filter end -->
                <!-- filter-by start -->
                <aside class="widget filter-by">
                    <h3 class="sidebar-title">Filter by</h3>
                    <ul class="sidebar-menu">
                        <li><a href="#">L</a> <span class="count">(1)</span></li>
                        <li><a href="#">M</a> <span class="count">(1)</span></li>
                        <li><a href="#">S</a> <span class="count">(1)</span></li>
                        <li><a href="#">XL</a> <span class="count">(1)</span></li>
                    </ul>
                </aside>
                <!-- filter-by end -->
                <!-- widget-tags start -->
                <aside class="widget widget-tags">
                    <h3 class="sidebar-title">Tags</h3>
                    <ul>
                        <li><a href="#">asian</a></li>
                        <li><a href="#">brown</a></li>
                        <li><a href="#">euro</a></li>
                        <li><a href="#">fashion</a></li>
                        <li><a href="#">france</a></li>
                        <li><a href="#">hat</a></li>
                        <li><a href="#">travel</a></li>
                        <li><a href="#">white</a></li>
                        <li><a href="#">t-shirt</a></li>
                        <li><a href="#">teen</a></li>
                    </ul>
                </aside>

                <!-- widget-tags end -->
                <!-- widget-recent start -->
                <aside class="widget top-product-widget">
                    <h3 class="sidebar-title">Top rated products</h3>
                    <ul>
                        <? if (!empty($product_sale)) {
                            foreach ($product_sale

                                     as $value) {
                                ?>
                                <li>
                                    <div class="single-product" style="width: 70%;">
                                        <a href="#">
                                            <img class="primary-image" src="<?php echo $value->getImageUrl() ?>"
                                                 alt=""/>
                                        </a>
                                        <div class="product-content">
                                            <h2 class="product-name">
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $value->id]) ?>">
                                                    <?php echo $value->name ?>
                                                </a></h2>
                                            <div class="price-box">
                                                <span class="new-price"><?= $value->price ?></span>
                                                <?php if ((float)$value->old_price): ?>
                                                    <span class="old-price"><?= $value->old_price ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <? }
                        } ?>
                    </ul>
                </aside>
                <!-- widget-recent end -->
            </div>
            <!-- blog-left-sidebar end -->


            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <!-- toolbar start -->
                <div class="toolbar">
                    <div class="show-result">
                        <p> Showing 0–<? echo $count = $dataProvider->getCount(); ?>
                            of <? echo $totalCount = $dataProvider->getTotalCount(); ?> results</p>
                    </div>

                    <div class="toolbar-form">

                        <div class="tolbar-select">
                            <button class="btn btn-gray dropdown-toggle" type="button" data-toggle="dropdown">Сортировка
                                по:
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?= \yii\helpers\Url::to(['?sort=price']); ?>">Цене, по возрастанию</a>
                                </li>
                                <li><a href="<?= \yii\helpers\Url::to(['?sort=-price']); ?>">Цене, по убыванию</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['?sort=name']); ?>">Названию товара, от А до Я</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['?sort=-name']); ?>">Названию товара, от Я до А</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- toolbar end -->
                    </aside>
                    <!-- widget-recent end -->
                    <!-- blog-left-sidebar end -->
                    <div class="clear"></div>
                    <?php Pjax::begin(); ?>
                    <?php echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => '<div class="row">{items}</div>{pager}',
                        'itemView' => '_product_item',
                        'itemOptions' => [

                            'class' => 'col-lg-4 col-md-6 mb-4  single-product',

                        ],

                        'pager' => [

                            'options' => ['class' => 'pagination', 'style' => 'color: #777'],
                            'linkOptions' => ['class' => 'row', 'style' => ' background-color: #0000'],
                            'disabledPageCssClass' => 'shop-pagination',
                            'class' => LinkPager::class
                        ]
                    ]) ?>
                    <?php Pjax::end(); ?>
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
                    <? if (!empty($brands)) {
                        foreach ($brands as $brand) { ?>


                            <!-- single-brand start -->
                            <div class="col-md-2">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo $brand->getImageUrl() ?>" alt=""/></a>
                                </div>
                            </div>
                            <!-- single-brand end -->
                        <? }
                    } ?>
                </div>
            </div>
        </div>

    </div>
    <!-- brand-area end -->

