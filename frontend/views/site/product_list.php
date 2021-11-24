<?php use yii\bootstrap4\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>


<?php Pjax::begin(); ?>

                   <?php
echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'layout' => '{summary}<div class="row">{items}</div>{pager}',
                        'itemView' => '_product_item',
//    'id' => 'updateDiv',
                        'itemOptions' => [
                            'class' => 'col-lg-4 col-md-6 mb-4  single-product',
//                            'id' => 'updateDiv'
                        ],

                        'pager' => [

                            'options' => ['class' => 'pagination', 'style' => 'color: #777'],
                            'linkOptions' => ['class' => 'row', 'style' => ' background-color: #0000'],
                            'disabledPageCssClass' => 'shop-pagination',
                            'class' => LinkPager::class
                        ]
                    ]) ?>
<?php Pjax::end(); ?>
