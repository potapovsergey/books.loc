<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `author`.
 */
class m170505_155824_create_author_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('author', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('author');
    }
}
