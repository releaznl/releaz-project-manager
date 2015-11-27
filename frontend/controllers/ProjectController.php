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
            'query' => Project::find()->andWhere(['or', ['creator_id' => Yii::$app->user->id], ['client_id' => Yii::$app->user->id], ['projectmanager_id' => Yii::$app->user->id]])
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	//$model = new NewProjectForm();
    	//$model->new_user = true;
    	$model = new Project();
    	$user = new User();
    	$customer = new Customer();
    	//$customer->scenario = 'createProject';
    	
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
    	$model->updater_id = Yii::$app->user->id;
    	
    	if (empty($model->client_id)) {
    		
    		if (!empty($customer->name)) {
    			// Save the project
    			
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
    				//var_dump($model->attributes); exit;
    				return $model->save(false);
    	
    			} else {
    				\Yii::$app->getSession()->setFlash('error', 'Could not save contact, please re-enter the fields');
    				return false;
    			}
    		}
    	} 
    	return $model->save();
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
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	return $this->redirect(['view', 'id' => $model->project_id]);
        } else {
        	return $this->render('update', [
        			'model' => $model,
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
