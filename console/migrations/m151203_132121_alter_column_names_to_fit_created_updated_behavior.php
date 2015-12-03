<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_132121_alter_column_names_to_fit_created_updated_behavior extends Migration
{
    public function up()
    {
		$this->renameColumn('bid_category', 'created_by', 'creator_id');
		$this->renameColumn('bid_category', 'updated_by', 'updater_id');
		
		$this->renameColumn('bid_part', 'created_by', 'creator_id');
		$this->renameColumn('bid_part', 'updated_by', 'updater_id');
    }

    public function down()
    {
    	$this->renameColumn('bid_part', 'updater_id', 'updated_by');
    	$this->renameColumn('bid_part', 'creator_id', 'created_by');
    	
    	$this->renameColumn('bid_category', 'updater_id', 'updated_by');
    	$this->renameColumn('bid_category', 'creator_id', 'created_by');
    	
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
