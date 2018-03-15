<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `books`.
 */
class m170505_155754_create_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books', [
            'id' => Schema::TYPE_PK,
            'name'=> Schema::TYPE_STRING.' NOT NULL',
            'description'=> Schema::TYPE_STRING.'(4096) NOT NULL',
            'price'=>Schema::TYPE_MONEY.' NOT NULL',
            'created_at'=>Schema::TYPE_INTEGER.' NOT NULL',
            'updated_at'=>Schema::TYPE_INTEGER.' NOT NULL',
            'images'=>Schema::TYPE_STRING,
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
