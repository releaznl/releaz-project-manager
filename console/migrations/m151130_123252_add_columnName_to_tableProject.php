<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_123252_add_columnName_to_tableProject extends Migration
{
    public function up()
    {
    	$this->addColumn('project', 'status', 'TINYINT');
		$this->addColumn('project', 'name', 'VARCHAR(128) NOT NULL');
		$this->alterColumn('project', 'description', 'BLOB');
    }

    public function down()
    {
    	$this->alterColumn('project', 'description', 'BLOB NOT NULL');
        $this->dropColumn('project', 'name');
        $this->dropColumn('project', 'status');

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
