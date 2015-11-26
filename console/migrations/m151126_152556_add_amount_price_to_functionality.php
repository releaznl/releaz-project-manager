<?php

use yii\db\Schema;
use yii\db\Migration;

class m151126_152556_add_amount_price_to_functionality extends Migration
{
    public function up()
    {
		$this->addColumn('functionality', 'amount', $this->integer());
		$this->addColumn('functionality', 'price', $this->float());
    }

    public function down()
    {

        $this->dropColumn('functionality', 'price', $this->float());
        $this->dropColumn('functionality', 'amount', $this->integer());
        
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
