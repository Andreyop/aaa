<?php
/** @var \common\models\Product $model */
/** @var TYPE_NAME $category */
/** @var \yii\data\ActiveDataProvider $dataProvider */


?>


<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="<?= \yii\helpers\Url::home() ?>">Home</a><span>  |  </span></li>
                        <li><?= $category->title ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<? echo $this->render('//layouts\inc\sidebar') ?>


<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
    <!-- toolbar start -->
    <div class="toolbar">
                <div class="show-result">
<!--                    <p> Showing 1–--><?// echo $count = $dataProvider->getCount();?><!-- of --><?// echo $totalCount = $dataProvider->getTotalCount();?><!-- results</p>-->
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

    <div class="clear"></div>

    <div class="row">

        <div class="grid-view">
            <!-- single-product start -->
            <?php if (!empty($products)) {
                foreach ($products as $product): ?>

                    <div class="col-lg-4 col-md-4 col-sm-4 single-product"  >

                        <div class="single-product" data-key=<?= $product->id; ?>>
                            <span class="sale-text">Sale</span>
                            <div class="product-img">
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                    <img class="primary-image" src="<?php echo $product->getImageUrl() ?>" alt=""/>

                                </a>
                                <div class="actions">
                                    <div class="action-buttons">
                                        <div class="add-to-cart">
                                            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn-add-to-cart">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" data-toggle="tooltip" title="Add to Wishlist"><i
                                                            class="fa fa-star"></i>
                                                </a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="Compare"><i
                                                            class="fa fa-exchange"></i></a>
                                            </div>
                                        </div>
                                        <div class="quickviewbtn">
                                            <a href="#" data-toggle="tooltip" title="Quick View"><i
                                                        class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2 class="product-name"><a href="#"><h3><?= $product->name ?></h3> <?= $product->description ?></a></h2>

                                <div class="price-box">
                                    <span class="new-price"><?= $product->price ?> Грн.</span>
                    <?php if((float)$product->old_price): ?>
                                    <span class="old-price"><?= $product->old_price ?></span>
                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach;
            } ?>
            <!-- single-product end -->

        </div>
    </div>

    <!-- single-product end -->
</div>
</div>
<!-- pagination start -->



<!-- pagination end -->
<!-- pagination start -->
<!--<div class="shop-pagination">-->
<!--    <div class="pagination">-->
<!--        <ul>-->
<!--            <li class="active">1</li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
<!--            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>-->
<!--            <div class="row">-->
                <?=
                /** @var TYPE_NAME $pages */
                \yii\bootstrap4\LinkPager::widget([
                        'linkContainerOptions'=>['class' => "shop-pagination"],
                        'activePageCssClass'=>'active',
                    'options' => ['class' => 'pagination','style' => 'color: #777'],
                    'linkOptions' => ['class' => 'row', 'style' => ' background-color: #0000'],
                    'disabledPageCssClass' => 'shop-pagination',
                    'pagination' => $pages,
                    'maxButtonCount' => 3,
                    'firstPageCssClass'=>'active'
                ]) ?>
<!--            </div>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!-- pagination end -->
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
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
                <!-- single-brand start -->
                <div class="col-md-2">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.png" alt=""/></a>
                    </div>
                </div>
                <!-- single-brand end -->
            </div>
        </div>
    </div>
</div>
<!-- brand-area end -->









