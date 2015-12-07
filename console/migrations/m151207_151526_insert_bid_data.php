<?php

use yii\db\Schema;
use yii\db\Migration;

class m151207_151526_insert_bid_data extends Migration
{
    public function up()
    {
		$this->insert('bid_category', [
				'name' => 'Stap 1 - Strategie',
				'ordering' => 1,
				'description' => 'Strategie',
				'creator_id' => '53',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '53',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();

		$this->insert('bid_part', [
				'name' => 'Samen kijken',
				'bid_category_id' => $id,
				'description' => 'Ik wil met jullie samen kijken waar ik met mijn organisatie heen wil en wat de website hierin kan bijdragen (€ 210,-)',
				'price' => 210,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 53,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 53,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'samenkijken',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Overslaan',
				'bid_category_id' => $id,
				'description' => 'Ik weet wat ik wil sla deze stap over, gas erop!',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 2,
				'creator_id' => 53,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 53,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'overslaan',
		]);
		
		$this->insert('bid_category', [
				'name' => 'Stap 2 - Design',
				'ordering' => 2,
				'description' => 'Nu gaan we kijken naar het ontwerp van de website',
				'creator_id' => '53',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '53',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$this->insert('bid_category', [
				'name' => 'Stap 3 - Planning',
				'ordering' => 3,
				'description' => 'Nu gaan we kijken naar de planning',
				'creator_id' => '53',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '53',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$this->insert('bid_category', [
				'name' => 'Stap 4 - Hosting',
				'ordering' => 4,
				'description' => 'Bepaling van de hosting',
				'creator_id' => '53',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '53',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();
		
		$this->insert('bid_part', [
				'name' => 'Ik heb al hosting',
				'bid_category_id' => $id,
				'description' => 'Ik heb al hosting bij iemand anders (€140,-)',
				'price' => 140,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 53,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 53,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'al_hosting',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Ik wil hosting',
				'bid_category_id' => $id,
				'description' => 'Ik wil graag hosting bij jullie',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 2,
				'creator_id' => 53,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 53,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'wil_hosting',
		]);
		
		$this->insert('bid_category', [
				'name' => 'Stap 5 - Content',
				'ordering' => 5,
				'description' => 'Nu hebben we jou nodig, we kunnen dit natuurlijk niet zonder jou. Upload een bestand met daarin een sitemap (boomstructuur van de website) en de inhoud (teksten, foto\'s etc.) van de pagina\'s.',
				'creator_id' => '53',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '53',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
    }

    public function down()
    {
    	
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
