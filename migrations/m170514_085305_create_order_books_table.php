<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `order_books`.
 */
class m170514_085305_create_order_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_books', [
            'id' => Schema::TYPE_PK,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_books');
    }
}
