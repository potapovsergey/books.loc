<?php

use yii\db\Schema;
use yii\db\Migration;

class m170608_225638_add_count_in_books_table extends Migration
{
    public function up()
    {
        $this->addColumn('books', 'count', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('books','count');
    }
}
