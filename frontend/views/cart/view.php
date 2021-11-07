<?php use common\models\CartItem;

$cartItems = new CartItem();
if(\Yii::$app->request->isAjax){
return 'Запрос принят!';
}
if($cartItems->load(\Yii::$app->request->post())){

}
$cartItems = CartItem::getItemsForUser(currUserId());
?>
<?php if (!empty($cartItems)): ?>
    <?php foreach ($cartItems as $item): ?>
        <div class="cart-img-details">
            <div class="cart-img-photo">
                <a href="<?php echo \yii\helpers\Url::to(['/cart/change-quantity']) ?>"><img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>" alt="" /></a>
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








