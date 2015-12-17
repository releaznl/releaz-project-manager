<?php

use yii\db\Schema;
use yii\db\Migration;

class m151215_125402_partof_rule extends Migration
{
    public function up()
    {
    	$auth = Yii::$app->authManager;
    	
    	// Create the PartOfRule
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
		
		// Give the admin all the permissions of the projectmanager
		$auth->addChild($auth->getRole('admin'), $auth->getRole('projectmanager'));
		
		// Create the EditFileRule
		$editFileRule = new \common\rbac\EditFileRule;
		$auth->add($editFileRule);
		
		$editFile = $auth->getPermission('editFile');
		$editFile->description = 'Is able to edit the file';
		$editFile->ruleName = $editFileRule->name;
		$auth->update('editFile', $editFile);
		
		$auth->addChild($editFile, $viewProject);
    }

    public function down()
    {
    	$auth = Yii::$app->authManager;
    	
    	// Remove the EditFileRule
    	$auth->removeChild($auth->getPermission('editFile'), $auth->getPermission('viewProject'));
    	
    	$auth->remove($auth->getRule('editFile'));
    	
    	// Remove the PartOfRule
    	$auth->removeChild($auth->getRole('admin'), $auth->getRole('projectmanager'));
    	$auth->removeChild($auth->getRole('projectmanager'), $auth->getPermission('viewProject'));
    	$auth->removeChild($auth->getRole('client'), $auth->getPermission('viewProject'));
    	$auth->removeChild($auth->getPermission('partOf'), $auth->getPermission('viewProject'));
    	
        $auth->remove($auth->getPermission('partOf'));
        $auth->remove($auth->getPermission('viewProject'));
        
    	$auth->remove($auth->getRule('isPartOf'));
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
