<?php

namespace frontend\controllers;

use common\models\CartItem;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

    public function actionView($id)
    {
        $product_sale = Product::find()->where(['sale' => 1])->limit(6)->all();
        $product = \common\models\Product::findOne($id);

        if (empty($product)) {
            throw new NotFoundHttpException('Такого продукта нет...');
        }

        $this->setMeta("{$product->name} :: " . \Yii::$app->name, $product->description);
        return $this->render('view', [
            'product' => $product,
            'product_sale' => $product_sale
        ]);
    }
    public function actionChangeQuantity()
    {
        $id = \Yii::$app->request->post('id');
        $product = Product::find()->id($id)->published()->one();
        if (!$product) {
            throw new NotFoundHttpException("Product does not exist");
        }
        $quantity = \Yii::$app->request->post('quantity');
        if (isGuest()) {
            $cartItems = \Yii::$app->session->get(CartItem::SESSION_KEY, []);
            foreach ($cartItems as &$cartItem) {
                if ($cartItem['id'] === $id) {
                    $cartItem['quantity'] = $quantity;
                    break;
                }
            }
            \Yii::$app->session->set(CartItem::SESSION_KEY, $cartItems);
        } else {
            $cartItem = CartItem::find()->userId(currUserId())->productId($id)->one();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return [
            'quantity' => CartItem::getTotalQuantityForUser(currUserId()),
            'price' => Yii::$app->formatter->asCurrency(CartItem::getTotalPriceForItemForUser($id, currUserId()))
        ];
    }


}