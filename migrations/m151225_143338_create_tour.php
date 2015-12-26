<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_143338_create_tour extends Migration
{
    public function up()
    {
        $this->createTable('tour', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'countAdults' => Schema::TYPE_INTEGER,
            'countChildren' => Schema::TYPE_INTEGER,
            'countSuckling' => Schema::TYPE_INTEGER,
            'positionFields' => Schema::TYPE_TEXT
        ]);
    }

    public function down()
    {
        $this->dropTable('tour');
        return true;
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
