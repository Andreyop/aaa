<?php

use yii\db\Migration;

/**
 * Class m211003_074658_drop_category_id_category
 */
class m211003_074658_drop_category_id_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('category', 'category_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_074658_drop_category_id_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_074658_drop_category_id_category cannot be reverted.\n";

        return false;
    }
    */
}
