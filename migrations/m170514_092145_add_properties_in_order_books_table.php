<?php

use yii\db\Schema;
use yii\db\Migration;

class m170514_092145_add_properties_in_order_books_table extends Migration
{
    public function up()
    {
        $this->addColumn('order_books','name', Schema::TYPE_STRING);
        $this->addColumn('order_books','price', Schema::TYPE_DECIMAL);
        $this->addColumn('order_books','quantity', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('order_books','name');
        $this->dropColumn('order_books','price');
        $this->dropColumn('order_books','quantity');
    }
}
