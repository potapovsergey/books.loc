<?php

use yii\db\Schema;
use yii\db\Migration;

class m170515_134341_add_user_id_in_profile_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('profile', 'user_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('user_profile', 'profile', 'user_id', 'user', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('user_profile', 'profile');
        $this->dropColumn('profile', 'user_id');
    }
}
