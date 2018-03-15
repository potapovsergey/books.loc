<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `profile`.
 */
class m170515_134011_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile', [
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING.' NOT NULL',
            'last_name' => Schema::TYPE_STRING.' NOT NULL',
            'phone_name' => Schema::TYPE_STRING.' NOT NULL',
            'address_name' => Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('profile');
    }
}
