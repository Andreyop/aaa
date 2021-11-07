<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brands}}`.
 */
class m211031_124357_create_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brands}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'image' => $this->string(2000),
            'status' => $this->tinyInteger(2)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
        $this->addColumn('products', 'brands_id', $this->integer()->after('category_id'));

        // add foreign key for table `{{%brands}}`
        $this->addForeignKey(
            '{{%fk-products-brands_id}}',
            '{{%products}}',
            'brands_id',
            '{{%brands}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brands}}');

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-products-brands_id}}',
            '{{%products}}'
        );
    }
}
