<?php

use yii\db\Schema;
use yii\db\Migration;
use common\models\BidCategory;

class m151218_085523_insert_websitepromotion_bid extends Migration
{
    public function up()
    {
		$this->update('bid_category', ['name' => 'Stap 5 - Promotie website', 'description' => 'Als de website live is, kunnen we u helpen met de online marketing'], ['ordering' => 5]);
		$id = BidCategory::find()->where(['ordering' => 5])->one()->id;
		$this->delete('bid_part', ['bid_category_id' => $id]);
		$this->delete('bid_part', ['attribute_name' => 'overslaan']);
		
		$this->insert('bid_part', [
				'name' => 'SocialMedia service',
				'bid_category_id' => $id,
				'description' => 'Hiermee kunt u uw website promoten met reclame op Social Media.',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 1,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'socialmedia_service',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Google Analytics service',
				'bid_category_id' => $id,
				'description' => 'Hiermee krijgt u inzicht in het gedrag van uw bezoekers.',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 2,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'google_analytics_service',
		]);
		
		$this->insert('bid_part', [
				'name' => 'Nieuwsbrief service',
				'bid_category_id' => $id,
				'description' => 'Hiermee kunnen uw klanten op de hoogte blijven van uw aanbiedingen en acties.',
				'price' => 0,
				'file_upload' => 0,
				'explanation' => 0,
				'ordering' => 3,
				'creator_id' => 1,
				'datetime_added' => '2015-12-04 11:59:40',
				'updater_id' => 1,
				'datetime_updated' => '2015-12-04 11:59:40',
				'deleted' => 0,
				'attribute_name' => 'nieuwsbrief_service',
		]);
    }

    public function down()
    {
    	$this->update('bid_category', ['name' => 'Stap 5 - Content', 'description' => 'Nu hebben we jou nodig, we kunnen dit natuurlijk niet zonder jou. Upload een bestand met daarin een sitemap (boomstructuur van de website) en de inhoud (teksten, foto\'s etc.) van de pagina\'s.'], ['ordering' => 5]);

    	
    	$id = BidCategory::find()->where(['ordering' => 5])->one()->id;
    	$this->delete('bid_part', ['bid_category_id' => $id]);
    	
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
    	
    	$this->insert('bid_part', [
    			'name' => 'Overslaan',
    			'bid_category_id' => BidCategory::find()->where(['ordering' => 1])->one()->id,
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
