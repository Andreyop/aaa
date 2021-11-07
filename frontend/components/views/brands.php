<?php
/*
 * Файл components/views/brands.php
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<ul class="sidebar-menu">
    <?php foreach ($brands as $brand): ?>
        <li>
            <a href="<?= Url::to(['brand/'.$brand['id']]); ?>">
                <span class="count">(<?= $brand['count']; ?>)</span>
                <?= Html::encode($brand['name']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
