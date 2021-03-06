<?php
/** @var \common\models\Product $model */
?>
<?php if ((float)$model->sale) { ?>
    <span class="sale-text">Sale</span>
<?php } ?>
<div class="product-img">
    <a href="<?php echo \yii\helpers\Url::to(['product/' . $model->id]) ?>">
        <img class="primary-image" src="<?php echo $model->getImageUrl() ?>" alt=""/>

    </a>
    <div class="actions">
        <div class="action-buttons">
            <div class="add-to-cart">
                <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn-add-to-cart">Добавить в корзину</a>
            </div>
<!--            <div class="add-to-links">-->
<!--                <div class="add-to-wishlist">-->
<!--                    <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-star"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="compare-button">-->
<!--                    <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>-->
<!--                </div>-->
<!--            </div>-->
            <div class="quickviewbtn">
                <a href="<?php echo \yii\helpers\Url::to(['product/' . $model->id]) ?>" data-toggle="tooltip" title="Просмотреть"><i class="fa fa-search-plus"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="product-content">
    <h2 class="product-name"><a href="<?php echo \yii\helpers\Url::to(['product/' . $model->id]) ?>"><h4><?= $model->name ?></h4> </a></h2>

    <div class="price-box">
        <span class="new-price"><?= $model->price ?> грн.</span>

        <?php if ((float)$model->old_price): ?>
            <span class="old-price"><?= $model->old_price ?></span>
        <?php endif; ?>
    </div>
</div>


<!-- single-product end -->