<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_120650_insert_contact_into_customer extends Migration
{
    public function up()
    {
		$this->addColumn('customer', 'contact', Schema::TYPE_STRING);
    }

    public function down()
    {
    	$this->dropColumn('customer', 'contact');
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
