<?php


namespace frontend\controllers;


use common\models\CartItem;



class CartminiController extends \frontend\base\Controller
{

    public function actionIndex()
    {

        $cartItems = CartItem::getItemsForUser(currUserId());

        return $this->render('index', [
            'items' => $cartItems
        ]);
    }
}