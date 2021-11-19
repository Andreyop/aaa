<?php


namespace frontend\controllers;


use common\models\Brands;
use common\models\Product;
use yii\data\ActiveDataProvider;

class BrandsController extends \frontend\base\Controller
{

    /**
     * Список всех брендов каталога товаров
     */
    public function actionBrands()
    {

        $brand = Brands::find();
        $brands = (new Brands())->getAllBrands();
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->published(),
            'pagination' => [
                'pageSize' =>15,
            ]
        ]);
        return $this->render(
            'brands', [
            'brands' => $brands,
            'brand' => $brand,
            'dataProvider'=>$dataProvider
        ]);

    }

    /**
     * Список товаров бренда с идентификатором $id
     */
    public function actionBrand($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->where(['brands_id' => $id]),

        ]);
        $brands = Brands::find()->where(['status' => 1])->limit(12)->all();
        $id = (int)$id;
        $temp = new Brands();
        // товары бренда
        $products = $temp->getBrandProducts($id);
        // данные о бренде
        $brand = $temp->getBrand($id);

        return $this->render(
            'brand', [
            'brand' => $brand,
            'brands' => $brands,
            'products' => $products,
            'dataProvider'=>$dataProvider
        ]);
    }
}