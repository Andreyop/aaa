<?php

use yii\db\Migration;

/**
 * Class m211026_232945_add_colums_sale
 */
class m211026_232945_add_colums_sale extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'sale', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211026_232945_add_colums_sale cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211026_232945_add_colums_sale cannot be reverted.\n";

        return false;
    }
    */
}
