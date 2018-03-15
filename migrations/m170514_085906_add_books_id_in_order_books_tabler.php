<?php

use yii\db\Schema;
use yii\db\Migration;

class m170514_085906_add_books_id_in_order_books_tabler extends Migration
{
    public function safeUp()
    {
        $this->addColumn('order_books', 'books_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_books_order', 'order_books', 'books_id', 'books', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_books_order', 'order_books');
        $this->dropColumn('order_books', 'books_id');
    }
}
