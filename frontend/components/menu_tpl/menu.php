<li <?php if (isset($category['children'])) echo 'class="dropdown"' ?>>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])
    ?>"<?php if (isset($category['children'])) echo 'class="dropdown-toggle"
    data-toggle="dropdown"' ?> >
        <?= \yii\helpers\Html::encode($category ['title']) ?>
    </a>
    <?php if (isset($category['children'])): ?>

            <div class="navbarDropdown">
                <ul class="dropdown-menu">



                    <?= $this->getMenuHtml($category['children']) ?>

                </ul>
            </div>

    <?php endif; ?>
</li>