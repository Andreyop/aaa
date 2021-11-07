<li <?= isset($category['children']) ? 'class="dropdown"' : '' ?>>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])
    ?>"<?php if (isset($category['children'])) echo 'class="dropdown-toggle"
    data-toggle="dropdown"' ?> >
        <?= \yii\helpers\Html::encode($category ['title']) ?>
    </a>
    <?php if (isset($category['children'])): ?>


                <ul class="dropdown-content">

                    <?php endif; ?>
                    <?php if (isset($category['children'])) : ?>
                    <?= $this->getMenuHtml($category['children']) ?>

                </ul>


    <?php endif; ?>
</li>
<!---->
<!--<div class="dropdown">-->
<!--    <button class="dropbtn">Dropdown</button>-->
<!--    <div class="dropdown-content">-->
<!--        <a href="#">Link 1</a>-->
<!--        <a href="#">Link 2</a>-->
<!--        <a href="#">Link 3</a>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<li --><?//= isset($category['children']) ? 'class="has-child"' : '' ?><!-- >-->
<!--    <a href="--><?//= \yii\helpers\Url::to(['category/view' , 'id' => $category['id']]) ?><!--">-->
<!--        --><?//= $category['title'] ?><!-- </a>-->
<!--    --><?php //if (isset($category['children'])) : ?>
<!--    <ul class="children">-->
<!--        --><?php //endif; ?>
<!---->
<!--        --><?php //if (isset($category['children'])) : ?>
<!--        --><?//= $this->getMenuHtml($category['children']) ?>
<!--    </ul>-->
<?php //endif; ?>
<!--</li>-->