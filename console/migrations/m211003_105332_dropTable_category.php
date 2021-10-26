<?php

use yii\db\Migration;

/**
 * Class m211003_105332_dropTable_category
 */
class m211003_105332_dropTable_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('category');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_105332_dropTable_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_105332_dropTable_category cannot be reverted.\n";

        return false;
    }
    */
}
