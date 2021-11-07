<?php

namespace frontend\controllers;

use common\models\Brands;
use common\models\Category;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($id)
    {
        $brands = Brands::find()->where(['status' => 1])->limit(12)->all();

        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->where(['category_id' => $id]),

        ]);
        $product_sale = Product::find()->where(['sale' => 1])->limit(3)->all();
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет...');
        }

        $this->setMeta("{$category->title} :: " . \Yii::$app->name, $category->keywords, $category->description);

        //$products = Product::find()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', [
                'products' => $products,
                'category' => $category,
                'pages' => $pages,
                'brands' => $brands,
                'dataProvider' => $dataProvider,
                'product_sale' => $product_sale
            ]

        );
    }

    public function actionSearch()
    {
        $q = trim(\Yii::$app->request->get('q'));
        $this->setMeta("Поиск: {$q} :: " . \Yii::$app->name);
        if (!$q) {
            return $this->render('search');
        }

        $query = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'pages', 'q'));
    }

}