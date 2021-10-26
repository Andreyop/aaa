<?php

use yii\db\Migration;

/**
 * Class m211003_081031_rename_category_parent_id_in_category_id
 */
class m211003_081031_rename_category_parent_id_in_category_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('category', 'parent_id', 'category_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_081031_rename_category_parent_id_in_category_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_081031_rename_category_parent_id_in_category_id cannot be reverted.\n";

        return false;
    }
    */
}
