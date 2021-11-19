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
                        <li>Все бренды</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row">


            <div class="shop-area">
                <?php if (!empty($brands)): ?>
                <div class="row">
                    <?php foreach ($brands

                    as $brand): ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail"
                        '>
                        <a href="<?php echo \yii\helpers\Url::to(['brand/' . $brand['id']]); ?>">
                            <?=
                            Html::img(
                                '@web/storage/' . $brand['image'],

                                [
                                    'style' => 'height: 220px',
                                    'alt' => $brand['name'],
                                    'a href' => Url::to(['brand/' . $brand['id']])
                                ]

                            );
                            ?>
                        </a>
                        <div class="caption">
                            <h2>
                                <a href="<?= Url::to(['brand/' . $brand['id']]); ?>">
                                    <?= Html::encode($brand['name']); ?>
                                </a>
                            </h2>
                            <!--                                        <p>-->
                            <? //= Html::encode($brand['content']); ?><!--</p>-->
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