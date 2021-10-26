<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

    public function actionView($id)
    {
        $product = \common\models\Product::findOne($id);
//        if(!empty($product)){
//            throw new NotFoundHttpException('Такого продукта нет...');
//        }

        $this->setMeta("{$product->name} :: " . \Yii::$app->name, $product->description);
        return $this->render('view', compact('product'));
    }

}