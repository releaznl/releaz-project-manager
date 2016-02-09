<?php

use yii\db\Schema;
use yii\db\Migration;

class m160104_155418_nullable_projectmanager extends Migration
{
    public function up()
    {
		$this->alterColumn('project', 'projectmanager_id', 'integer');
    }

    public function down()
    {
		return $this->alterColumn('project', 'projectmanager_id', 'integer NOT NULL');
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
