<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 */
class m170425_083200_create_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'author' => Schema::TYPE_STRING.' NOT NULL',
            'year' => Schema::TYPE_INTEGER.' NOT NULL',
            'description' => Schema::TYPE_STRING.'(512) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER.' NOT NULL',
            'update_at' => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('books');
    }
}
