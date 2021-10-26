<?php

namespace frontend\assets;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'build/app.css',
//        'vendor/fontawesome-free/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
//        'css/sb-admin-2.min.css',
//        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
//        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800',
//        'http://fonts.googleapis.com/css?family=Montserrat:400,700',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
        'css/owl.transitions.css',
        'css/fancybox/jquery.fancybox.css',
        'css/animate.css',
        'css/meanmenu.min.css',
        'css/normalize.css',
        'lib/rs-plugin/css/settings.css',
        'css/main.css',
        'css/style.css',
        'css/responsive.css',




    ];
    public $js = [
        'build/app.js',
//        "vendor/jquery-easing/jquery.easing.min.js",
//        "vendor/chart.js/Chart.min.js",
//        "js/sb-admin-2.min.js",
//        'js/vendor/modernizr-2.8.3.min.js',
//        'js/vendor/jquery-1.12.0.min.js',
        'js/price-slider.js',
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.scrollUp.min.js',
        'js/jquery.mixitup.min.js',
        'js/fancybox/jquery.fancybox.pack.js',
        'js/jquery.counterup.min.js',
//        'js/waypoints.min.js',
        'js/jquery.meanmenu.js',
        'lib/rs-plugin/js/jquery.themepunch.tools.min.js',
        'lib/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'lib/rs-plugin/rs.home.js',
        'js/plugins.js',
//        'js/main.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
//        JqueryAsset::class,
//        BootstrapPluginAsset::class
    ];
}
