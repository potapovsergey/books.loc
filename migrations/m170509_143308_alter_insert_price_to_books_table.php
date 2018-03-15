<?php

use yii\db\Migration;
use yii\db\Schema;

class m170509_143308_alter_insert_price_to_books_table extends Migration
{
    public function up()
    {
        $this->alterColumn('books','price', Schema::TYPE_DECIMAL);
    }

    public function down()
    {

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
