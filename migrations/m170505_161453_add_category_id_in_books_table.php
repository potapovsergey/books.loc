<?php

use yii\db\Migration;
use yii\db\Schema;

class m170505_161453_add_category_id_in_books_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('books','category_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('category_books', 'books', 'category_id', 'category', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('category_books', 'books');
        $this->dropColumn('books','category_id');
    }
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
