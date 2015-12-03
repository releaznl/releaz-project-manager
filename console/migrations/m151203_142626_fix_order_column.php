<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_142626_fix_order_column extends Migration
{
    public function up()
    {
    	$this->dropTable('bid_part');
    	$this->dropTable('bid_category');
    	
    	$this->createTable('bid_category', [
    			'id' => Schema::TYPE_PK,
    			'name' => Schema::TYPE_STRING . '(125) NOT NULL',
    			'ordering' => Schema::TYPE_INTEGER . '(11) NOT NULL',
    			'description' => Schema::TYPE_TEXT,
    			'creator_id' => Schema::TYPE_INTEGER . '(11)',
    			'datetime_added' => Schema::TYPE_DATETIME,
    			'updater_id' => Schema::TYPE_INTEGER . '(11)',
    			'datetime_updated' => Schema::TYPE_DATETIME,
    			'deleted' => Schema::TYPE_BOOLEAN,
    	]);
    	
    	$this->addForeignKey('bid_category_fk1', 'bid_category', 'creator_id', 'user', 'id');
    	$this->addForeignKey('bid_category_fk2', 'bid_category', 'updater_id', 'user', 'id');
    	
    	$this->createTable('bid_part', [
    			'id' => Schema::TYPE_PK,
    			'name' => Schema::TYPE_STRING . '(125) NOT NULL',
    			'bid_category_id' => Schema::TYPE_INTEGER . '(11)',
    			'description' => Schema::TYPE_TEXT,
    			'price' => Schema::TYPE_MONEY,
    			'file_upload' => Schema::TYPE_BOOLEAN,
    			'explanation' => Schema::TYPE_BOOLEAN,
    			'ordering' => Schema::TYPE_INTEGER . '(11)',
    			'creator_id' => Schema::TYPE_INTEGER . '(11)',
    			'datetime_added' => Schema::TYPE_DATETIME,
    			'updater_id' => Schema::TYPE_INTEGER . '(11)',
    			'datetime_updated' => Schema::TYPE_DATETIME,
    			'deleted' => Schema::TYPE_BOOLEAN,
    	]);
    	
    	$this->addForeignKey('bid_part_fk1', 'bid_part', 'creator_id', 'user', 'id');
    	$this->addForeignKey('bid_part_fk2', 'bid_part', 'updater_id', 'user', 'id');
    	
    	$this->addForeignKey('bid_part_fk3', 'bid_part', 'bid_category_id', 'bid_category', 'id');
    }

    public function down()
    {
    	$this->dropTable('bid_part');
    	$this->dropTable('bid_category');
    	
        $this->createTable('bid_category', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(125) NOT NULL',
			'order' => Schema::TYPE_INTEGER . '(11) NOT NULL',
			'description' => Schema::TYPE_TEXT,
			'created_by' => Schema::TYPE_INTEGER . '(11)',
			'datetime_added' => Schema::TYPE_DATETIME,
			'updated_by' => Schema::TYPE_INTEGER . '(11)',
			'datetime_updated' => Schema::TYPE_DATETIME,
			'deleted' => Schema::TYPE_BOOLEAN,
		]);
		
		$this->addForeignKey('bid_category_fk1', 'bid_category', 'created_by', 'user', 'id');
		$this->addForeignKey('bid_category_fk2', 'bid_category', 'updated_by', 'user', 'id');
		
		$this->createTable('bid_part', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(125) NOT NULL',
			'bid_category_id' => Schema::TYPE_INTEGER . '(11)',
			'description' => Schema::TYPE_TEXT,
			'price' => Schema::TYPE_MONEY,		
			'file_upload' => Schema::TYPE_BOOLEAN,
			'explanation' => Schema::TYPE_BOOLEAN,
			'order' => Schema::TYPE_INTEGER . '(11)',
			'created_by' => Schema::TYPE_INTEGER . '(11)',
			'datetime_added' => Schema::TYPE_DATETIME,
			'updated_by' => Schema::TYPE_INTEGER . '(11)',
			'datetime_updated' => Schema::TYPE_DATETIME,
			'deleted' => Schema::TYPE_BOOLEAN,
		]);
		
		$this->addForeignKey('bid_part_fk1', 'bid_part', 'created_by', 'user', 'id');
		$this->addForeignKey('bid_part_fk2', 'bid_part', 'updated_by', 'user', 'id');
		
		$this->addForeignKey('bid_part_fk3', 'bid_part', 'bid_category_id', 'bid_category', 'id');

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
