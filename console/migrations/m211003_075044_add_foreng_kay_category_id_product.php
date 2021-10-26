<?php

use yii\db\Migration;

/**
 * Class m211003_075044_add_foreng_kay_category_id_product
 */
class m211003_075044_add_foreng_kay_category_id_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('foreign_key_test', 'products', 'category_id', 'category', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_075044_add_foreng_kay_category_id_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_075044_add_foreng_kay_category_id_product cannot be reverted.\n";

        return false;
    }
    */
}
