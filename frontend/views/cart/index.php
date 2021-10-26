<?php
/** @var array $items */
?>


<div class="card">
    <div class="col-md-12">
        <div class="entry-header">
            <h1 class="entry-title">Your cart items</h1>
        </div>
    </div>
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if (!empty($items)): ?>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total Price</th>
                                <th class="product-remove">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr data-id="<?php echo $item['id'] ?>"
                                    data-url="<?php echo \yii\helpers\Url::to(['/cart/change-quantity']) ?>">
                                    <td class="product-name"><a
                                                href="<?php echo \yii\helpers\Url::to(['product/view?id=' . $item['id']]) ?>"><?php echo $item['name'] ?></a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>"
                                             alt="<?php echo $item['name'] ?>">
                                    </td>
                                    <td class="product-price"><span
                                                class="amount"><?php echo Yii::$app->formatter->asCurrency($item['price']) ?></span>
                                    </td>
                                    <td class="product-quantity">
                                        <input type="number" min="1" class="form-control item-quantity"
                                               value="<?php echo $item['quantity'] ?>">
                                    </td>
                                    <td class="product-subtotal"><?php echo Yii::$app->formatter->asCurrency($item['total_price']) ?></td>
                                    <td class="product-remove">
                                        <?php echo \yii\helpers\Html::a('Delete', ['/cart/delete', 'id' => $item['id']], [
                                            'class' => 'btn btn-outline-danger btn-sm',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Are you sure you want to remove this product from cart?'
                                        ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="card-body text-right">
                            <div class="wc-proceed-to-checkout">
                                <a href="<?php echo \yii\helpers\Url::to(['/cart/checkout']) ?>"
                                   class="wc-proceed-to-checkout">Checkout</a>
                            </div>
                            <?php else: ?>

                                <p class="text-muted text-center p-5">There are no items in the cart</p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


