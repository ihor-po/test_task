<?php

use yii\db\Migration;

class m170909_104251_creating_table_products extends Migration
{
    public function safeUp()
    {

        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'asin' => $this->string(10)->notNull()->unique(),
            'title' => $this->string(255)->notNull(),
            'price' => $this->float()->notNull(),
            'picture' => $this->string(),
            'EAN' => $this->string(255)->notNull()->unique(),
            'Brand' => $this->string(255)
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170909_104251_creating_table_products cannot be reverted.\n";

        return false;
    }
    */
}
