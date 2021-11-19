<?php

namespace common\i18n;


class Formatter extends \yii\i18n\Formatter
{
    public function asOrderStatus($status)
    {
        if ($status == \common\models\Order::STATUS_COMPLETED) {
            return \yii\bootstrap4\Html::tag('span', 'Завершенный', ['class' => 'badge badge-success']);
        } else if ($status == \common\models\Order::STATUS_PAID) {
            return \yii\bootstrap4\Html::tag('span', 'Оплаченный', ['class' => 'badge badge-primary']);
        } else if ($status == \common\models\Order::STATUS_DRAFT) {
            return \yii\bootstrap4\Html::tag('span', 'Неоплаченный', ['class' => 'badge badge-secondary']);
        } else {
            return \yii\bootstrap4\Html::tag('span', 'Неудачный', ['class' => 'badge badge-danger']);
        }
    }
}