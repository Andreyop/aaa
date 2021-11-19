<?php
/** @var float $totalPrice */
/** @var array $items */
/** @var array $cartItems */
/* @var $this \yii\web\View */

/* @var $content string */
/** @var \common\models\Order $order */
/** @var \common\models\OrderAddress $orderAddress */
/** @var array $cartItems */
/** @var int $productQuantity */
/** @var \common\models\Product $model */
/** @var TYPE_NAME $category */
/** @var TYPE_NAME $product */

/** @var float $totalPrice */

use common\models\CartItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Pjax;


$cartItemCount = $this->params['cartItemCount'];
$totalPrice = CartItem::getTotalPriceForUser(currUserId());
$cartItems = new CartItem();
$cartItems = CartItem::getItemsForUser(currUserId());


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- header start -->
<header>
    <!-- header-top-area start -->
    <div class="header-top-area hidden-xs">
        <div class="container">
            <div class="row">
                <!-- header-top-left start -->
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="header-top-left">
                        <div class="top-message">Default welcome message</div>
                        <div class="phone-number"> Call support free: <span>123 456  789</span></div>
                    </div>
                </div>
                <!-- header-top-left end -->
                <!-- header-top-right start -->
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <div class="header-top-right">
                        <div class="top-menu">
                           <div class="mainmenu1">

                            <? if (Yii::$app->user->isGuest) {
                                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                            } else {
                                $menuItems[] = [
                                    'label' => Yii::$app->user->identity->getDisplayName(),
                                    'dropDownOptions' => [
                                        'class' => 'dropdown-content'

                                    ],
                                    'items' => [
                                        [
                                            'label' => 'Profile',
                                            'url' => ['/profile/index'],
                                        ],
                                        [
                                            'label' => 'Logout',
                                            'url' => ['/site/logout'],
                                            'linkOptions' => [
                                                'data-method' => 'post'
                                            ],
                                        ]
                                    ]
                                ];
                            }
                            echo Nav::widget([
                                'options' => ['class' => 'header-top-right'],
                                'items' => $menuItems,
                            ]);
                            ?>

                        </div>
                        </div>
                    </div>
                </div>
                <!-- header-top-right end -->
            </div>
        </div>
    </div>
    <!-- header-top-area end -->
    <!-- header-mid-area start -->
    <div class="header-mid-area">
        <div class="container">
            <div class="row">
                <!-- logo start -->
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo">
                        <a href="<? echo \yii\helpers\Url::home(); ?>"><img src="/img/logo/logo.png" alt="<?= $this->title ?>"/></a>
                    </div>
                </div>
                <!-- logo end -->
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <!-- cart-total start -->
                    <div class="cart-total">
                        <ul>
                            <li><a href="<? echo Url::to('/cart/index'); ?>"><span class="cart-icon"><i
                                                class="fa fa-shopping-cart"></i><span class="cart-no">Корзина  <span
                                                    id="cart-quantity"
                                                    class="badge badge-danger"><?= $cartItemCount; ?></span>

		<div class="mini-cart-content">
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="cart-img-details">
											<div class="cart-img-photo">
												<a href="<?php echo \yii\helpers\Url::to(['/cart/change-quantity']) ?>"><img
                                                            src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>"
                                                            alt=""/></a>
												<span class="quantity"><?php echo $item['quantity'] ?></span>
											</div>
											<div class="cart-img-contaent">
												<a href="#"><p><?php echo $item['name'] ?></p></a>
												<span><?= $item['price'] ?> грн.</span>
											</div>
											<div class="pro-del">       <?php echo \yii\helpers\Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                                                    'class' => 'btn btn-outline-danger btn-sm',
                                                    'data-method' => 'post',
                                                    'data-confirm' => 'Вы уверены, что хотите удалить этот товар из корзины?'
                                                ]) ?>
											</div>
										</div>
                    <?php endforeach; ?>
                <?php endif; ?>

										<div class="cart-inner-bottom">
											<p class="total">Subtotal: <span class="amount"><?php echo $totalPrice ?> Грн.</span></p>
											<div class="clear"></div>
											<p class="cart-button-top"><a href="<? echo Url::to('/cart/index'); ?>">Checkout</a></p>
										</div>
									</div>

                            </li>
                        </ul>
                    </div>
                    <!-- cart-total end -->
                    <!-- header-search start -->

                    <div class="header-search">
                        <form method="post" action="<?= Url::to(['site/search']); ?>" class="pull-right">
                            <?=
                            Html::hiddenInput(
                                Yii::$app->request->csrfParam,
                                Yii::$app->request->csrfToken
                            );
                            ?>
                            <input type="text" name="query" class="form-control" placeholder="Search product..."/>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- header-search end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area end -->
    <!-- mainmenu-area start -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li><a href="<? echo \yii\helpers\Url::home(); ?>">Home</a></li>
                                <li><a href="<? echo \yii\helpers\Url::to('/site/about'); ?>">About</a></li>
                                <li><a href="<?= Url::to(['/brands']); ?>">Бренды</a></li>
                                <li><a href="shop.html">Shop</a>
                                    <div class="mega-menu">
											<span>
												<a href="#" class="mega-title">WOMEN CLOTH </a>
												<a href="shop.html">casual shirt</a>
												<a href="shop.html">rikke t-shirt</a>
												<a href="shop.html">mia top </a>
												<a href="shop.html">muscle tee </a>
											</span>
                                        <span>
												<a href="#" class="mega-title">MEN CLOTH </a>
												<a href="shop.html">casual shirt</a>
												<a href="shop.html">rikke t-shirt</a>
												<a href="shop.html">mia top </a>
												<a href="shop.html">muscle tee </a>
											</span>
                                        <span>
												<a href="#" class="mega-title">WOMEN JEWELRY </a>
												<a href="shop.html">necklace </a>
												<a href="shop.html">chunky short striped </a>
												<a href="shop.html">samhar cuff</a>
												<a href="shop.html">nail set </a>
											</span>
                                        <span class="mega-menu-img">
												<a href="shop.html"><img alt="" src="img/4.jpg"></a>
											</span>
                                    </div>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.html">about us</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                        <li><a href="shop.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="product-virtual.html">product Details</a></li>
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-post-img.html">blog details</a></li>
                                        <li><a href="cart.html">shopping cart</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="my-account.html">my-account</a></li>
                                        <li><a href="404.html">404 page</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Footwear </a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mainmenu-area end -->
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="about-us.html">about us</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                        <li><a href="shop.html">shop grid</a></li>
                                        <li><a href="shop-list.html">shop list</a></li>
                                        <li><a href="product-virtual.html">product Details</a></li>
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-post-img.html">blog details</a></li>
                                        <li><a href="cart.html">shopping cart</a></li>
                                        <li><a href="checkout.html">checkout</a></li>
                                        <li><a href="wishlist.html">wishlist</a></li>
                                        <li><a href="my-account.html">my-account</a></li>
                                        <li><a href="404.html">404 page</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area end -->
</header>
<!-- header end -->


<? //= $this->render('\inc\sidebar') ?>
<?= Alert::widget() ?>


<?= $content ?>


<!-- footer start -->
<footer>
    <!-- footer-top-area start -->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <!-- footer-widget start -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <img src="img/logo/logo.png" alt=""/>
                        <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim
                            placerat facer possim assum. .</p>
                        <div class="widget-icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- footer-widget end -->
                <!-- footer-widget start -->
                <div class="col-lg-3 col-md-3 hidden-sm">
                    <div class="footer-widget">
                        <h3>Our services</h3>
                        <ul class="footer-menu">
                            <li><a href="#">Shipping & Returns</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">International Shipping</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-widget end -->
                <!-- footer-widget start -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3>Our services</h3>
                        <ul class="footer-menu">
                            <li><a href="#">Shipping & Returns</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">International Shipping</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-widget end -->
                <!-- footer-widget start -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3>CONTACT US</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="fa fa-map-marker"> </i>
                                Addresss: 123 Pall Mall, London England
                            </li>
                            <li>
                                <i class="fa fa-envelope"> </i>
                                Email: admin@themepure.net
                            </li>
                            <li>
                                <i class="fa fa-phone"> </i>
                                Phone: +8801912 199981
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- footer-widget end -->
            </div>
        </div>
    </div>
    <!-- footer-top-area end -->
    <!-- footer-bottom-area start -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="copyright">
                        <p>Copyright © <a href="#">ThemePure</a>. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="payment-img">
                        <img src="img/payment.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-area end -->
</footer>
<!-- footer end -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<div class="brand-area pad-60">



