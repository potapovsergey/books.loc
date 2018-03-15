<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `category`.
 */
class m170505_155859_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
                'id' => Schema::TYPE_PK,
                'category' => Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
