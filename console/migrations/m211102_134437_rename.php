<?php

use yii\db\Migration;

/**
 * Class m211102_134437_rename
 */
class m211102_134437_rename extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('category', 'create_at', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211102_134437_rename cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211102_134437_rename cannot be reverted.\n";

        return false;
    }
    */
}
