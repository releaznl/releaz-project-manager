<?php

use yii\db\Schema;
use yii\db\Migration;

class m151209_122441_insert_users extends Migration
{
    public function up()
    {
		$this->insert('user', [
				'id' => 1,
				'username' => 'admin',
				'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password'),
				'role_id' => 0,
				'created_at' => 0,
				'updated_at' => 0,
				'email' => 'admin@releaz.nl'
				]);
		
		$this->insert('customer', [
				'customer_id' => 1,
				'user_id' => 1,
				'name' => 'Releaz',
				'address' => 'Zeewinde 3-11',
				'email_address' => 'admin@releaz.nl',
		]);
		
		$this->insert('user', [
				'id' => 2,
				'username' => 'projectmanager',
				'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password'),
				'role_id' => 0,
				'created_at' => 0,
				'updated_at' => 0,
				'email' => 'projectmanager@releaz.nl',
		]);
		
		$this->insert('customer', [
				'customer_id' => 2,
				'user_id' => 2,
				'name' => 'Releaz',
				'address' => 'Zeewinde 3-11',
				'email_address' => 'projectmanager@releaz.nl',
		]);
		
		$this->insert('user', [
				'id' => 3,
				'username' => 'user',
				'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password'),
				'role_id' => 0,
				'created_at' => 0,
				'updated_at' => 0,
				'email' => 'info@releaz.nl',
		]);
		
		$this->insert('customer', [
				'customer_id' => 3,
				'user_id' => 3,
				'name' => 'Releaz',
				'address' => 'Zeewinde 3-11',
				'email_address' => 'info@releaz.nl',
		]);
    }

    public function down()
    {
        $this->delete('customer', ['customer_id' => 3]);
        $this->delete('user', ['id' => 3]);
        $this->delete('customer', ['customer_id' => 2]);
        $this->delete('user', ['id' => 2]);
        $this->delete('customer', ['customer_id' => 1]);
        $this->delete('user', ['id' => 1]);

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
