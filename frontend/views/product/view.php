<?php
/** @var TYPE_NAME $product */
?>


<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?= \yii\helpers\Url::home() ?>">Home</a> <i class="fa fa-angle-right"></i></li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->title ?></a>
                            <i class="fa fa-angle-right"></i></li>
                        <li><?= $product->name; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->


<!-- product-simple-area start -->
<div class="product-simple-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-product-image">
                    <div class="single-product-tab">
                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home"><img alt=""
                                                                                        src="<?php echo $product->getImageUrl() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-product-info">
                    <div class="product-nav">
                        <a href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <h1 class="product_title"><?= $product->name; ?></h1>
                    <div class="price-box">
                        <span class="new-price"><?= $product->price; ?> грн.</span>
                        <?php if ((float)$product->old_price): ?>
                        <span class="old-price"><?= $product->old_price; ?> грн.</span>
                        <?php endif; ?>
                    </div>
                    <div class="pro-rating">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                    </div>
                    <div class="short-description">
                        <p><?= $product->description; ?></p>
                    </div>
                    <div class="stock-status">
                        <label>Availability</label>: <strong>In stock</strong>
                    </div>
                    <form action="#">
                        <div class="quantity">
                            <div class="single-product" data-key= <?= $product->id ?>>
                                <button href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>"
                                        class="btn-add-to-cart">Add to cart
                                </button>
                                <!--                                <div class="add-to-cart">-->
                                <!--                                    <a href="-->
                                <?php //echo \yii\helpers\Url::to(['/cart/add']) ?><!--" type="submit" class="btn-add-to-cart">Add to cart</a>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </form>

                    <div class="share_buttons">
                        <a href="#"><img src="img/share-img.png" alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-simple-area end -->
<div class="product-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="product-tabs">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab-desc" aria-controls="tab-desc"
                                                                      role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#page-comments" aria-controls="page-comments" role="tab"
                                                       data-toggle="tab">Reviews (1)</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab-desc">
                                <div class="product-tab-desc">
                                    <p><?= $product->description; ?></p>
                                    <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis
                                        fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa
                                        massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit
                                        est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere
                                        nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et,
                                        luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod
                                        eget.</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="page-comments">
                                <div class="product-tab-desc">
                                    <div class="product-page-comments">
                                        <h2>1 review for Integer consequat ante lectus</h2>
                                        <ul>
                                            <li>
                                                <div class="product-comments">
                                                    <img src="img/blog/avatar.png" alt=""/>
                                                    <div class="product-comments-content">
                                                        <p><strong>admin</strong> -
                                                            <span>March 7, 2015:</span>
                                                            <span class="pro-comments-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</span>
                                                        </p>
                                                        <div class="desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                            fringilla augue nec est tristique auctor. Donec non est at
                                                            libero vulputate rutrum.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="review-form-wrapper">
                                            <h3>Add a review</h3>
                                            <form action="#">
                                                <input type="text" placeholder="your name"/>
                                                <input type="email" placeholder="your email"/>
                                                <div class="your-rating">
                                                    <h5>Your Rating</h5>
                                                    <span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
                                                    <span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
                                                    <span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
                                                    <span>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
													</span>
                                                </div>
                                                <textarea id="product-message" cols="30" rows="10"
                                                          placeholder="Your Rating"></textarea>
                                                <input type="submit" value="submit"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="upsells_products_widget">
                    <div class="section-heading">
                        <h3>Up-Sells</h3>
                        <div class="title-icon">
                            <span><i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-view">

                        <? if (!empty($product_sale)) {
                            foreach ($product_sale as $value) {
                                ?>
                                <!-- single-product start -->

                                    <div class="col-lg-4 col-md-4 col-sm-4 single-product" data-key="<?= $value->id; ?>" >
                                        <span class="sale-text">Sale</span>
                                        <div class="product-img">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $value->id]) ?>">
                                                <img class="primary-image" src="<?php echo $value->getImageUrl() ?>"
                                                     alt="<?= $value->name ?>"/>
                                            </a>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-cart">
                                                        <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>"
                                                           class="btn-add-to-cart">Add to cart</a>
                                                    </div>
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $value->id]) ?>"
                                                               data-toggle="tooltip" title="Add to Wishlist"><i
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
                                            <h2 class="product-name"><a
                                                        href="<?= \yii\helpers\Url::to(['product/view', 'id' => $value->id]) ?>"><? echo $value->name ?></a>
                                            </h2>
                                            <div class="pro-rating">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price"><? echo $value->price ?></span>
                                            </div>
                                        </div>
                                    </div>

                                <!-- single-product end -->
                                <?
                            }
                        } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <!-- widget-recent start -->

                <aside class="widget top-product-widget">
                    <h3 class="sidebar-title">Recent</h3>
                          <? if (!empty($product_sale)) {
                    foreach ($product_sale as $value) {
                    ?>
                    <ul>


                            <li>
                                <div class="single-product">
                                    <div class="product-img1">
                                        <a href="#">
                                            <img class="primary-image" src="<?php echo \common\models\Product::formatImageUrl($value['image']) ?>" alt="" />
                                            <img class="secondary-image" src="img/product/16.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="pro-info">
                                            <h2 class="product-name"><a href="#">Curabitur vulputate</a></h2>
                                            <div class="price-box">
                                                <span class="new-price"><?= $value->name ?></span>
                                                <span class="old-price">£120.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>



                    </ul>
                        <?
                    }
                          } ?>
                </aside>
                <!-- widget-recent end -->
            </div>
        </div>
    </div>
</div>

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
