<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="product-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'category_id',
                [
                    'attribute' => 'image',
                    'format' => ['html'],
                    'value' => Html::img($model->getImageUrl(), ['style' => 'width: 50px']),
                ],
                [
                    'attribute' => 'name',
                    'options' => [
                        'style' => 'white-space: normal'
                    ]
                ],
                'description:html',
                'price:currency',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' =>Html::tag('span', $model->status ? 'Active' : 'Draft', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]),
                ],

                'created_at:datetime',
                'updated_at:datetime',
                'createdBy.username',
                'updatedBy.username',
            ],
        ]);
 ?>

</div>
