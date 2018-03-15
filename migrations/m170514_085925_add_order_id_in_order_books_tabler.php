<?php

use yii\db\Schema;
use yii\db\Migration;

class m170514_085925_add_order_id_in_order_books_tabler extends Migration
{
    public function safeUp()
    {
        $this->addColumn('order_books', 'order_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_order', 'order_books', 'order_id', 'order', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_order', 'order_books');
        $this->dropColumn('order_books', 'order_id');
    }
}
