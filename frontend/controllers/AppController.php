<?php

namespace frontend\controllers;

use common\models\CartItem;
use yii\web\Controller;

class AppController extends Controller
{

    public function beforeAction($action)
    {
        $this->view->params['cartItemCount'] = CartItem::getTotalQuantityForUser(currUserId());
        $this->view->title = \Yii::$app->name;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
    public function actionPopolam($action)
    {
        $this->view->params['cartItem'] = CartItem::getTotalQuantityForUser(currUserId());

        if(\Yii::$app->request->isAjax){
            return 'Запрос принят!';
        }
        if($this->load(\Yii::$app->request->post())){

        }

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

}