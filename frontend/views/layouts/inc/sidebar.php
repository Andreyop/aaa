






<!-- blog-area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <!-- shop-left-sidebar start -->
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <!-- widget-categories start -->

<!--                <aside class="widget widget-categories" >-->
                    <h3 class="sidebar-title">Categories</h3>
<div class="mainmenu1">
    <ul class="sub-menu">
                <?= frontend\components\MenuWidget::widget([
                    'tpl' => 'menu',
                    'ul_class' => 'sub-menu',
                ]) ?>
    </ul>

</div>

<!--                </aside>-->
                <!-- widget-categories end -->
                <!-- shop-filter start -->
                <aside class="widget shop-filter">
                    <h3 class="sidebar-title">price</h3>
                    <div class="info_widget">
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                <input type="submit"  value="Filter"/>
                            </div>
                        </div>
                    </div>
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
                        <li>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-image" src="img/product/15.jpg" alt="" />
                                        <img class="secondary-image" src="img/product/16.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="pro-info">
                                        <h2 class="product-name"><a href="#">Curabitur vulputate</a></h2>
                                        <div class="price-box">
                                            <span class="new-price">£90.00</span>
                                            <span class="old-price">£120.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-image" src="img/product/women/8.jpg" alt="" />
                                        <img class="secondary-image" src="img/product/women/1.jpg" alt="" />
                                    </a>
                                </div>

                                <div class="product-content">
                                    <div class="pro-info">
                                        <h2 class="product-name"><a href="#">Pellentesque posuere</a></h2>
                                        <div class="price-box">
                                            <span class="new-price">£50.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </aside>
                <!-- widget-recent end -->
                <? print_r(__DIR__); ?>
            </div>
            <!-- blog-left-sidebar end -->
























<!---->
<!--            <div class="w3l_banner_nav_left">-->
<!--                <nav class="navbar nav_bottom">-->
<!--                    <!- Brand and toggle get grouped for better mobile display-->
<!--                    <div class="navbar-header nav_2">-->
<!--                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">-->
<!--                            <span class="sr-only">Toggle navigation</span>-->
<!--                            <span class="icon-bar"></span>-->
<!--                            <span class="icon-bar"></span>-->
<!--                            <span class="icon-bar"></span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <!- Collect the nav links, forms, and other content for toggling-->
<!--                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">-->
<!--                        --><?//= frontend\components\MenuWidget::widget([
//                            'tpl' => 'menu',
//                            'ul_class' => 'nav navbar-nav nav_1',
//                        ]) ?>
<!--                    </div>-->
<!--                </nav>-->
<!--            </div>-->


















