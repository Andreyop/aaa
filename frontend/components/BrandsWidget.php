<?php


namespace frontend\components;


use common\models\Brands;
use Yii;
use yii\base\Widget;

/**
 * Виджет для вывода списка брендов каталога
 */
class BrandsWidget extends Widget {

    public function run() {
            $brands = (new Brands())->getPopularBrands();
            $html = $this->render('brands', ['brands' => $brands]);

        return $html;
    }

}