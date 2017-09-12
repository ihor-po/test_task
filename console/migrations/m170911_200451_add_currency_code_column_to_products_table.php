<?php

use yii\db\Migration;

/**
 * Handles adding currency_code to table `products`.
 */
class m170911_200451_add_currency_code_column_to_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'currency_code', $this->string(3));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

    }
}
