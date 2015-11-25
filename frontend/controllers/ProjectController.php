<?php

namespace frontend\controllers;

use Yii;
use common\models\Project;
use common\models\Customer;

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
    	if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		return ActiveForm::validate($model);
    	}
    	 
    	$model = new NewProjectForm();
    	 
    	return $this->render('create', ['model' => $model]);
    	
//         $model = new Project();
//         $model->projectmanager_id = Yii::$app->user->id;
        
//         $createCustomer = true;
        
// //         $customer = new Customer();
        
//         if ($model->load(Yii::$app->request->post())) {
            
//             $model->deleted = 0;
//             $model->creator_id = Yii::$app->user->id;
//             $model->updater_id = Yii::$app->user->id;
            
//             $model->save();
            
// //                $customer->save();
            
//             return $this->redirect(['view', 'id' => $model->project_id]);
//         } else {
//             return $this->render('create', [
//                 'model' => $model,
//             ]);
//         }
    }
    
    public function actionNew() {
    	
    	if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		return ActiveForm::validate($model);
    	}
    	
    	$model = new NewProjectForm();
    	
    	return $this->render('create', ['model' => $model]);
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
