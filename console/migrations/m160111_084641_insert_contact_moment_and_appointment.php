<?php

use yii\db\Schema;
use yii\db\Migration;

class m160111_084641_insert_contact_moment_and_appointment extends Migration
{
    public function up()
    {
		$this->createTable('contact_moment', [
				'id' => $this->primaryKey(), 
				'moment' => $this->dateTime(),
				'customer_id' => $this->integer(),
				'comment' => $this->string(),
				'creator_id' => $this->integer(),
				'updater_id' => $this->integer(),
				'datetime_added' => $this->dateTime(),
				'datetime_updated' => $this->dateTime(),
				'deleted' => $this->boolean(),
		]);
		
		$this->createIndex('idx-contact_moment-customer_id', 'contact_moment', 'customer_id');
		$this->addForeignKey('fk-contact_moment-customer_id', 'contact_moment', 'customer_id', 'customer', 'customer_id');
		$this->addForeignKey('fk-contact_moment-created_by-user_id', 'contact_moment', 'creator_id', 'user', 'id');
		$this->addForeignKey('fk-contact_moment-updated_by-user_id', 'contact_moment', 'updater_id', 'user', 'id');
		
		$this->createTable('meeting', [
				'id' => $this->primaryKey(),
				'contact_moment_id' => $this->integer(),
				'moment' => $this->dateTime(),
				'comment' => $this->string(),
				'creator_id' => $this->integer(),
				'updater_id' => $this->integer(),
				'datetime_added' => $this->dateTime(),
				'datetime_updated' => $this->dateTime(),
				'deleted' => $this->boolean(),
		]);
		
		$this->createIndex('idx-meeting-contact_moment_id', 'meeting', 'contact_moment_id');
		$this->addForeignKey('fk-meeting-contact_moment_id', 'meeting', 'contact_moment_id', 'contact_moment', 'id');
		$this->addForeignKey('fk-meeting_creator_id-user_id', 'meeting', 'creator_id', 'user', 'id');
		$this->addForeignKey('fk-meeting_updater_id-user_id', 'meeting', 'updater_id', 'user', 'id');
		
		$this->alterColumn('customer', 'user_id', 'INT');
    }

    public function down()
    {
        $this->dropTable('meeting');
        $this->dropTable('contact_moment');
        
        $this->alterColumn('customer', 'user_id', 'INT NOT NULL');
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
