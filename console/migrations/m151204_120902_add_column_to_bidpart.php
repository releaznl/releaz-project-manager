<?php

use yii\db\Schema;
use yii\db\Migration;

class m151204_120902_add_column_to_bidpart extends Migration
{
    public function up()
    {
		$this->addColumn('bid_part', 'attribute_name', Schema::TYPE_STRING . '(125) NOT NULL');
    }

    public function down()
    {
    	$this->dropColumn('bid_part', 'attribute_name');

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
