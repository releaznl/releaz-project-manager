<?php

namespace frontend\controllers;

use Yii;
use common\models\Project;
use common\models\Customer;
use common\models\User;

use frontend\models\NewProjectForm;

use frontend\components\web\FrontendController;

use yii\data\ActiveDataProvider;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

use yii\filters\VerbFilter;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends FrontendController
{

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Project::find()->andWhere(['or', ['creator_id' => Yii::$app->user->id], ['client_id' => Customer::find()->where(['user_id' => Yii::$app->user->id])->one()->customer_id], ['projectmanager_id' => Yii::$app->user->id]])
            ->with('creator', 'client', 'projectmanager', 'updater'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	
    	$model = $this->findModel($id);
    	if (Yii::$app->user->can('viewProject', ['project' => $model], false)) {
	        return $this->render('view', [
	            'model' => $model,
	        ]);
    	}
    	throw new NotFoundHttpException('The requested page does not exist.');
    	
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	
    	$model = new Project();
    	$user = new User();
    	$customer = new Customer();
    	
    	if ($model->load(Yii::$app->request->post()) && $customer->load(Yii::$app->request->post()) && $this->saveProject($model, $customer)) {
    		return $this->redirect(['view', 'id' => $model->project_id]);
    	} else {
    		return $this->render('create', [
    		
    			'model' => $model,
    			'user' => $user,
    			'customer' => $customer,
    		]);
    	}
    	return $this->render('create', [
    			'model' => $model,
    			'user' => $user,
    			'customer' => $customer,
    	]);
    }
    
    public function saveProject($model, $customer) {
    	
    	if (empty($model->client_id)) {
    		
    		if (!empty($customer->name)) {
    			// Save the project

    			Yii::$app->session->addFlash('danger', Yii::t('common', 'Client check.'));
    			$user = new User();
    			$user->username = $customer->email_address;
    			$user->email = $user->username;
    			$user->setPassword(Yii::$app->security->generateRandomString(10));
    		
    			Yii::trace('User saved', 'ProjectController.saveProject()');
    			
    			$user->save();
    			$customer->user_id = $user->id;
    			
    			if ($customer->save(false)) {
    				// We can save the contact
    				$model->client_id = $customer->customer_id;
    				$model->creator_id = Yii::$app->user->id;
    				return $model->save(false);
    	
    			} else {
    				return false;
    			}
    		}
    	} else {
	    	return $model->save(false);
    	}
    	return false;
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $customer = new Customer();
        $user = new User();
        
        if ($model->load(Yii::$app->request->post()) && $customer->load(Yii::$app->request->post()) && $this->saveProject($model, $customer)) {
        	return $this->redirect(['view', 'id' => $model->project_id]);
        } else {
        	return $this->render('update', [
        			'model' => $model,
        			'customer' => $customer,
        			'user' => $user,
        	]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$this->findModel($id)->delete();
    	
    	return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
