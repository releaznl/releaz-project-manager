<?php

use yii\db\Schema;
use yii\db\Migration;

class m151209_151526_insert_bid_data extends Migration
{
    public function up()
    {
    	// Stap 1
		$this->insert('bid_category', [
				'name' => 'Stap 1 - Strategie',
				'ordering' => 1,
				'description' => 'Strategie',
				'creator_id' => '1',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '1',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();

		$this->insert('bid_part', [
				'name' => 'Samen kijken',
				'bid_category_id' => $id,
				'description' => 'Ik wil met jullie samen kijken waar ik met mijn organisatie heen wil en wat de website hierin kan bijdragen',
				'price' => 210,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
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
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'overslaan',
		]);
		
		// Stap 2
		$this->insert('bid_category', [
				'name' => 'Stap 2 - Design',
				'ordering' => 2,
				'description' => 'Nu gaan we kijken naar het ontwerp van de website',
				'creator_id' => '1',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '1',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();
		
		$this->insert('bid_part', [
				'name' => 'Website 1',
				'bid_category_id' => $id,
				'description' => 'Selecteer een website',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'website1',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Website 2',
				'bid_category_id' => $id,
				'description' => 'Selecteer een website',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 2,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'website2',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Website 3',
				'bid_category_id' => $id,
				'description' => 'Selecteer een website',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 3,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'website3',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Doel',
				'bid_category_id' => $id,
				'description' => 'Beschrijf het doel',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 4,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'goal',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Huidige stijl',
				'bid_category_id' => $id,
				'description' => 'Een upload van de huisstijl',
				'price' => 0,
				'file_upload' => 1,
				'explanation' => 0,
				'ordering' => 5,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'current_style',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Doelgroep',
				'bid_category_id' => $id,
				'description' => 'Een bepaling van de doelgroep',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 5,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'target_audience',
		]);
		
		// Stap 3
		$this->insert('bid_category', [
				'name' => 'Stap 3 - Planning',
				'ordering' => 3,
				'description' => 'Nu gaan we kijken naar de planning',
				'creator_id' => '1',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '1',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();
		
		$this->insert('bid_part', [
				'name' => 'Deadline',
				'bid_category_id' => $id,
				'description' => 'Je eigen deadline. (Laat het leeg als je geen deadline hebt)',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'deadline',
		]);
		
		// Stap 4
		$this->insert('bid_category', [
				'name' => 'Stap 4 - Hosting',
				'ordering' => 4,
				'description' => 'Bepaling van de hosting',
				'creator_id' => '1',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '1',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();
		
		$this->insert('bid_part', [
				'name' => 'Hosting informatie',
				'bid_category_id' => $id,
				'description' => 'Vul hier uw hostinginformatie in',
				'price' => 140,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'informatie',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Ik heb al hosting',
				'bid_category_id' => $id,
				'description' => 'Ik heb al hosting bij iemand anders',
				'price' => 140,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 2,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
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
				'ordering' => 3,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'wil_hosting',
		]);
		
		// Stap 5
		$this->insert('bid_category', [
				'name' => 'Stap 5 - Content',
				'ordering' => 5,
				'description' => 'Nu hebben we jou nodig, we kunnen dit natuurlijk niet zonder jou. Upload een bestand met daarin een sitemap (boomstructuur van de website) en de inhoud (teksten, foto\'s etc.) van de pagina\'s.',
				'creator_id' => '1',
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => '1',
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => false
		]);
		
		$id = Yii::$app->db->getLastInsertId();
		
		$this->insert('bid_part', [
				'name' => 'Content',
				'bid_category_id' => $id,
				'description' => 'Nu hebben we jou nodig, we kunnen dit natuurlijk niet zonder jou',
				'price' => 0,
				'file_upload' => 1,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'content',
		]);
    }

    public function down()
    {
    	$this->delete('bid_part', ['attribute_name' => 'content']);
    	$this->delete('bid_category', ['name' => 'Stap 5 - Content']);
    	
    	
    	$this->delete('bid_part', ['attribute_name' => 'al_hosting']);
    	$this->delete('bid_part', ['attribute_name' => 'wil_hosting']);
    	$this->delete('bid_part', ['attribute_name' => 'informatie']);
    	$this->delete('bid_category', ['name' => 'Stap 4 - Hosting']);
    	
    	$this->delete('bid_part', ['attribute_name' => 'deadline']);
    	$this->delete('bid_category', ['name' => 'Stap 3 - Planning']);

    	$this->delete('bid_part', ['attribute_name' => 'target_audience']);
    	$this->delete('bid_part', ['attribute_name' => 'current_style']);
    	$this->delete('bid_part', ['attribute_name' => 'goal']);
    	$this->delete('bid_part', ['attribute_name' => 'website3']);
    	$this->delete('bid_part', ['attribute_name' => 'website2']);
    	$this->delete('bid_part', ['attribute_name' => 'website1']);
    	$this->delete('bid_category', ['name' => 'Stap 2 - Design']);

    	$this->delete('bid_part', ['attribute_name' => 'overslaan']);
    	$this->delete('bid_part', ['attribute_name' => 'samenkijken']);
    	$this->delete('bid_category', ['name' => 'Stap 1 - Strategie']);
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
