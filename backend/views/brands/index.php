<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BrandsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Brands');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Brands'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Image',
                'attribute' => 'image',
                'content' => function ($model) {
                    /** @var \common\models\Brands $model */
                    return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
                }
            ],
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    /** @var \common\models\Brands $model */
                    return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
