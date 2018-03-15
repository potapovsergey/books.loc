<?php

use yii\db\Migration;
use yii\db\Schema;

class m170505_161441_add_year_id_in_books_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('books','year_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('year_books', 'books', 'year_id', 'year', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('year_books', 'books');
        $this->dropColumn('books','year_id');
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
