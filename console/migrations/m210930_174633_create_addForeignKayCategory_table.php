<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addForeignKayCategory}}`.
 */
class m210930_174633_create_addForeignKayCategory_table extends Migration
{
    public function safeUp()
    {
        $this->renameTable('product_category', 'category');
    }


    public function safeDown()
    {
        echo "m210930_174633_create_addForeignKayCategory_table.\n";

        return false;
    }
}
