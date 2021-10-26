<?php
/** @var array $items */

?>



<?php if (!empty($items)): ?>

<?php foreach ($items as $item): ?>
<tr data-id="<?php echo $item['id'] ?>" data-url="<?php echo \yii\helpers\Url::to(['/cart/change-quantity']) ?>">
    <div class="cart-img-details">
        <div class="cart-img-photo">
            <a href="#"><img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>" alt=""/></a>
            <span class="quantity"><?php echo $item['quantity'] ?></span>
        </div>
        <div class="cart-img-contaent">
            <a href="#"><p><?php echo $item['name'] ?></p></a>
            <span><?php echo Yii::$app->formatter->asCurrency($item['price']) ?></span>
        </div>
        <div class="pro-del"><a href="#"><i class="fa fa-times-circle"></i></a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <div class="clear"></div>
    <? var_dump($items); ?>
    <div class="cart-inner-bottom">
        <p class="total">Subtotal: <span class="amount"><?php echo Yii::$app->formatter->asCurrency($item['total_price']) ?></span></p>
        <div class="clear"></div>
        <p class="cart-button-top"><a href="../../../backend/web/index.php">Checkout</a></p>
    </div>
  <?  $js = <<<JS
            $('mini-cart-content').on('mouseenter', function(){
    var data = $(this).serialize();
    $.ajax({
    url: '/cart/view',
    type: 'POST',
    data: data,
    success: function(res){
    console.log(res);
    },
    error: function(){
    alert('Error!');
    }
    });
    return false;
    });
    JS;?>









