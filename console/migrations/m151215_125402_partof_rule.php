<?php

use yii\db\Schema;
use yii\db\Migration;

class m151215_125402_partof_rule extends Migration
{
    public function up()
    {
    	$auth = Yii::$app->authManager;
    	
		$rule = new \common\rbac\PartOfRule;
		$auth->add($rule);
		
		$partOf = $auth->createPermission('partOf');
		$partOf->description = 'Is part of the project';
		$partOf->ruleName = $rule->name;
		$auth->add($partOf);
		
		$viewProject = $auth->createPermission('viewProject');
		$viewProject->description = 'Allows the user to view the a project';
		$auth->add($viewProject);
		
		$auth->addChild($partOf, $viewProject);
		$auth->addChild($auth->getRole('client'), $partOf);
		$auth->addChild($auth->getRole('projectmanager'), $viewProject);
		$auth->addChild($auth->getRole('admin'), $auth->getRole('projectmanager'));
    }

    public function down()
    {
    	$auth = Yii::$app->authManager;
    	$auth->remove($auth->getPermission('partOf'));
        $auth->remove($auth->getRule('isPartOf'));
        $auth->remove($auth->getPermission('viewProject'));
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
