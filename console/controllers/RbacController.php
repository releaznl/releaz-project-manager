<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        
        // Permissions
        
        // add "editTodo" permission
        // allows the Client to edit the todo 
        $editTodo = $auth->createPermission('editTodo');
        $editTodo->description = 'Allows the Client to edit the todo';
        $auth->add($editTodo);
        
        // add "editFile" permission
        // Allows the Client to edit the file
        $editFile = $auth->createPermission('editFile');
        $editFile->description = 'Allows the Client to edit the file';
        $auth->add($editFile);
        
        // add "editFunctionality" permission
        // Allows the Projectmanager to edit the functionality
        $editFunctionality = $auth->createPermission('editFunctionality');
        $editFunctionality->description = 'Allows the Projectmanager to edit the functionality';
        $auth->add($editFunctionality);
        
        // add "editProject" permission
        // Allows the Projectmanager to edit the Project
        $editProject = $auth->createPermission('editProject');
        $editProject->description = 'Allows the Projectmanager to edit the Project';
        $auth->add($editProject);
        
        
        // add "createProject" permission
        // Allows the Projectmanager to create a new Project, Functionality, Todo and File
        $createProject = $auth->createPermission('createProject');
        $createProject->description = 'Allows the Projectmanager to create a new Project';
        $auth->add($createProject);
        
        // add "backend" permission
        $backend = $auth->createPermission('maintainBackend');
        $backend->description = 'Allows the Admin to maintain the backend';
        $auth->add($backend);
        
        // Roles
        
        // add "Client" role with the permissions to edit todo's and files
        $client = $auth->createRole('client');
        $auth->add($client);
        $auth->addChild($client, $editTodo);
        $auth->addChild($client, $editFile);
        
        // add "Projectmanager" role with the permission to edit functionalities and projects
        $projectmanager = $auth->createRole('projectmanager');
        $auth->add($projectmanager);
        $auth->addChild($projectmanager, $editFunctionality);
        $auth->addChild($projectmanager, $editProject);
        $auth->addChild($projectmanager, $createProject);
        $auth->addChild($projectmanager, $client);
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backend);
        
        // Assign roles to users
        $auth->assign($admin, 14);
        $auth->assign($projectmanager, 1);
    }
    
    public function actionBackend() {
    	$auth = \Yii::$app->authManager;
    	
    	// add "Admin" role with the permission to edit everything and to create projects
    	//$admin = $auth->createRole('admin');
    	//$auth->add($admin);
    	
    	//$backend = $auth->createPermission('maintainBackend');
    	//$backend->description = 'Allows the Admin to maintain the backend';
    	//$auth->add($backend);
    	
    	$backend = $auth->getPermission('maintainBackend');
    	
    	$projectmanager = $auth->getRole('projectmanager');
    	
    	$admin = $auth->getRole('admin');
    	$auth->addChild($admin, $backend);
    	$auth->addChild($admin, $projectmanager);
    }
    
    public function actionProjectmanager() {
    	$auth = Yii::$app->authManager;
    	$pm = $auth->getRole('projectManager');
    	$auth->addChild($pm, $auth->getPermission('createProject'));
    }
}

?>