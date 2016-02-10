<?php

use yii\db\Schema;
use yii\db\Migration;

class m160210_134847_monthly_boolean_functionality extends Migration
{
    public function up()
    {
        $this->addColumn('functionality', 'monthly_costs', Schema::TYPE_BOOLEAN);
    }

    public function down()
    {
        $this->dropColumn('functionality', 'monthly_costs');

        return false;
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
