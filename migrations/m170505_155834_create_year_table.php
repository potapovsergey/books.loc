<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `year`.
 */
class m170505_155834_create_year_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('year', [
            'id' => Schema::TYPE_PK,
            'year' => Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('year');
    }
}
