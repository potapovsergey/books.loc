<?php

use yii\db\Migration;
use yii\db\Schema;

class m170505_161422_add_author_id_in_books_table extends Migration
{
    public function safeUp()
    {
            $this->addColumn('books','author_id', Schema::TYPE_INTEGER);
            $this->addForeignKey('author_books', 'books', 'author_id', 'author', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
            $this->dropForeignKey('author_books', 'books');
            $this->dropColumn('books','author_id');
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
