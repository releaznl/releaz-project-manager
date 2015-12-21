<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_075500_monthly_costs_in_bid_part extends Migration
{
    public function up()
    {
		$this->addColumn('bid_part', 'monthly_costs', Schema::TYPE_BOOLEAN);
		$this->update('bid_part', ['monthly_costs' => false]);
		$this->update('bid_part', ['monthly_costs' => true, 'price' => 100], ['attribute_name' => 'socialmedia_service']);
		$this->update('bid_part', ['monthly_costs' => true, 'price' => 50], ['attribute_name' => 'google_analytics_service']);
		$this->update('bid_part', ['monthly_costs' => true, 'price' => 200], ['attribute_name' => 'nieuwsbrief_service']);
		$this->update('bid_part', ['price' => 140], ['attribute_name' => 'informatie']);
		
		$this->insert('bid_part', ['name' => 'Vaste eenmalige kosten', 
				'description' => 'Dit zijn de vaste eenmalige kosten voor een project',
				'price' => 250,
				'explanation' => false,
				'file_upload' => false,
				'ordering' => 0,
				'attribute_name' => 'oneoff_costs',
				'monthly_costs' => false,
				'creator_id' => 1, 
				'updater_id' => 1, 
				'datetime_added' => '2015-12-04 11:59:40',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false,
		]);
		
		$this->insert('bid_part', ['name' => 'Vaste maandelijkse kosten',
				'description' => 'Dit zijn de vaste maandelijkse kosten voor een project',
				'price' => 39.95,
				'explanation' => false,
				'file_upload' => false,
				'ordering' => 0,
				'attribute_name' => 'monthly_costs',
				'monthly_costs' => true,
				'creator_id' => 1,
				'updater_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false,
		]);
		
		
		$this->addColumn('customer', 'contact_type', Schema::TYPE_INTEGER);
		$this->update('customer', ['contact_type' => 0]);
    }

    public function down()
    {
    	$this->dropColumn('bid_part', 'monthly_costs');
    	$this->delete('bid_part', ['attribute_name' => 'oneoff_costs']);
    	$this->delete('bid_part', ['attribute_name' => 'monthly_costs']);
    	
    	$this->dropColumn('customer', 'contact_type');
    	
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
