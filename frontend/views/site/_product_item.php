<?php
/** @var \common\models\Product $model */
?>

<span class="sale-text">Sale</span>
<div class="product-img">
    <a href="<?php echo \yii\helpers\Url::to(['product/view?id=' . $model->id]) ?>">
        <img class="primary-image" src="<?php echo $model->getImageUrl() ?>" alt=""/>

    </a>
    <div class="actions">
        <div class="action-buttons">
            <div class="add-to-cart">
                <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn-add-to-cart">Add to cart</a>
            </div>
            <div class="add-to-links">
                <div class="add-to-wishlist">
                    <a href="#" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-star"></i>
                    </a>
                </div>
                <div class="compare-button">
                    <a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
                </div>
            </div>
            <div class="quickviewbtn">
                <a href="#" data-toggle="tooltip" title="Quick View"><i class="fa fa-search-plus"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="product-content">
    <h2 class="product-name"><a href="#"><h3><?= $model->name ?></h3> <?= $model->description ?></a></h2>

    <div class="price-box">
        <span class="new-price"><?= $model->price ?> грн.</span>

        <?php if((float)$model->old_price): ?>
            <span class="old-price"><?= $model->old_price ?></span>
        <?php endif; ?>
    </div>
</div>


<!-- single-product end -->