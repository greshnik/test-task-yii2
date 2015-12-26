<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_143854_create_custom_tour_fields extends Migration
{
    public function up()
    {
        $this->createTable('customTourFields', [
            'id' => Schema::TYPE_PK,
            'tourId' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('customTourFields');
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
