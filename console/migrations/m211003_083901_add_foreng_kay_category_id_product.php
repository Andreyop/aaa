<?php

use yii\db\Migration;

/**
 * Class m211003_083901_add_foreng_kay_category_id_product
 */
class m211003_083901_add_foreng_kay_category_id_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('products', 'category_id', $this->integer(11)->defaultValue('0')->null());
        $this->alterColumn('category', 'category_id', $this->integer(11)->defaultValue('0')->null());
        $this->addForeignKey('category_id', 'category', 'category_id', 'products', 'category_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_083901_add_foreng_kay_category_id_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_083901_add_foreng_kay_category_id_product cannot be reverted.\n";

        return false;
    }
    */
}
