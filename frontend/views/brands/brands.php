<?php
/*
 * Страница списка всех брендов
 */

use frontend\components\BrandsWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a
                                    href="<?= \yii\helpers\Url::home() ?>">Home</a><span>  |  </span></li>
                        <li>All brands</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="category-products">
<!--                        --><?//= TreeWidget::widget(); ?>
                    </div>

                    <h2>Бренды</h2>
                    <div class="brand-products">
                        <?= BrandsWidget::widget(); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <h1>Все бренды</h1>
                <?php if (!empty($brands)): ?>
                    <div class="row">
                        <?php foreach ($brands as $brand): ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="<?php echo \yii\helpers\Url::to(['brand/' . $brand['id']]); ?>">
                                    <?=
                                    Html::img(
                                        '@web/storage/'.$brand['image'],

                                        [
                                                'alt' => $brand['name'],
                                        'a href'=> Url::to(['brand/'.$brand['id']])
                                        ]
                                    );
                                    ?>
                                    </a>
                                    <div class="caption">
                                        <h2>
                                            <a href="<?= Url::to(['brand/'.$brand['id']]); ?>">
                                                <?= Html::encode($brand['name']); ?>
                                            </a>
                                        </h2>
<!--                                        <p>--><?//= Html::encode($brand['content']); ?><!--</p>-->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>