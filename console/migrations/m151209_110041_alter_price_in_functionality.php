<?php

use yii\db\Schema;
use yii\db\Migration;

class m151209_110041_alter_price_in_functionality extends Migration
{
    public function up()
    {
		$this->alterColumn('functionality', 'price', Schema::TYPE_MONEY);
    }

    public function down()
    {
    	$this->alterColumn('functionality', 'price', Schema::TYPE_FLOAT);
    	
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
