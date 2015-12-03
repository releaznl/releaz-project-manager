<?php

use yii\db\Schema;
use yii\db\Migration;

class m151203_080959_offertes extends Migration
{
    public function up()
    {
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
			'ordering' => Schema::TYPE_INTEGER . '(11)',
			'creator_id' => Schema::TYPE_INTEGER . '(11)',
			'datetime_added' => Schema::TYPE_DATETIME,
			'updater_id' => Schema::TYPE_INTEGER . '(11)',
			'datetime_updated' => Schema::TYPE_DATETIME,
			'deleted' => Schema::TYPE_BOOLEAN,
		]);
		
		$this->addForeignKey('bid_part_fk1', 'bid_part', 'created_by', 'user', 'id');
		$this->addForeignKey('bid_part_fk2', 'bid_part', 'updated_by', 'user', 'id');
		
		$this->addForeignKey('bid_part_fk3', 'bid_part', 'bid_category_id', 'bid_category', 'id');
    }

    public function down()
    {
    	$this->dropTable('bid_part');
    	$this->dropTable('bid_category');

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
