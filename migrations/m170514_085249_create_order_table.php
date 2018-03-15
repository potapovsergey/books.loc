<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170514_085249_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING.' NOT NULL',
            'last_name' => Schema::TYPE_STRING.' NOT NULL',
            'phone' => Schema::TYPE_STRING.' NOT NULL',
            'address' => Schema::TYPE_STRING.' NOT NULL',
            'number_post' => Schema::TYPE_INTEGER.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
