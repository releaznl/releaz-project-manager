<?php

namespace frontend\controllers;

use Yii;
use common\models\Project;
use common\models\File;
use common\models\Todo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\components\web\FrontendController;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


/**
 * FileController implements the CRUD actions for File model.
 */
class FileController extends FrontendController
{
	
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
					[
						'allow' => true,
						'actions' => ['index', 'view'],
						'roles' => ['@', 'projectmanager', 'admin'],
					],
                	[
                		'allow' => true,
                		'actions' => ['update', 'create'],
                		'roles' => ['@', 'projectmanager', 'admin'],
                	],
                	[
                		'allow' => true,
                		'roles' => ['admin'],
                	]
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all File models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['/project']);
    }

    /**
     * Displays a single File model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
    	
    	if (!Yii::$app->user->can('editFile', ['file' => $model])) {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    	
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new File model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid = null, $tid = null)
    {
        $model = new File();    
        
        if ($model->attributes = \Yii::$app->request->post('File')) {
        	$file = UploadedFile::getInstance($model, 'uploaded_file');
        	
        	$project_id;
        	
	    	if ($pid) 
	    	{
	    		$model->project_id = $pid;
	    		$project_id = $pid;
	    	} 
	    	else if ($tid) 
	    	{
	    		$model->todo_id = $tid;
	    		$project_id = $model->todo->functionality->project->project_id;
	    	} 
	    	else 
	    	{
	    		$project_id = $model->project_id;
	    	}
	    	
	    	// Check if a file has been uploaded and a project or todo has been set
	    	if ($file != null && ($model->project_id || $model->todo_id)) {
	    		
		    	$model->name = $file->baseName . '.' . $file->extension;
	    	
		    	if ($model->validate()) {
		    		// Save the File in database
		    		$model->save(false);
	
		    		// Make the directory for the file
		    		$dir = getcwd() . '/uploads/projects/' . $project_id . '/' . $model->file_id;
		    		mkdir($dir, 0777, true);
		    		
		    		if ($file->saveAs($dir . '/' . $file->baseName . '.' . $file->extension)) {
		        		return $this->redirect(['view', 'id' => $model->file_id]);
		    		}
		    	}
	    	}
        }
        
        if (!$pid && !$tid && Yii::$app->user->can('viewProject')) {
	    	return $this->render('create', [
	    			'model' => $model,
	    			'projects' => Project::find()->all(),
	    			'todos' => Todo::find()->all(),
	    	]);
        } 
        
        if ($pid) {
        	if (Yii::$app->user->can('viewProject', ['project' => Project::find()->where(['project_id' => $pid])->one()])) {
        		
        		$model->project_id = $pid;
        		
        		return $this->render('create', [
        				'model' => $model,
        		]);
        	}
        	
        	throw new NotFoundHttpException('The requested page does not exist.');
        } 
        else if ($tid) 
        {
        	$todo = Todo::find()->where(['todo_id' => $tid])->one();
        	
        	if ($todo) {
	        	if (Yii::$app->user->can('viewProject', ['project' => $todo->functionality->project])) {
	        		$model->todo_id = $tid;
	        		
	        		return $this->render('create' , [
	        				'model' => $model,
	        		]);
	        	}
        	}
        	
        	throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Updates an existing File model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
    	if (!Yii::$app->user->can('editFile', ['file' => $model])) {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->file_id]);
        } else {
           return $this->render('update', [
                'model' => $model,
            	'projects' => Project::find()->all(),
            	'todos' => Todo::find()->all(),
            ]); 
        }
    }

    /**
     * Deletes an existing File model.
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
     * Finds the File model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
