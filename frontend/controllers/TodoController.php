<?php

namespace frontend\controllers;

use Yii;
use common\models\Todo;
use common\models\File;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Object;

/**
 * TodoController implements the CRUD actions for Todo model.
 */
class TodoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Todo models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['/project']);
    }

    /**
     * Displays a single Todo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
    	
    	if (Yii::$app->user->can('viewProject', ['project' => $model->functionality->project])) 
    	{
	        return $this->render('view', [
	            'model' => $model,
	        	'dataProvider' => new ActiveDataProvider([
	        			'query' => File::find()->where(['todo_id' => $id]),
	        	]),
	        ]);
    	}
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Todo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($fid)
    {
        $model = new Todo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->todo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Todo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->todo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Todo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = $this->findModel($id);
    	$project_id = $model->functionality_id;
        $model->delete();

        return $this->redirect(['functionality/view', 'id' => $project_id]);
    }

    /**
     * Finds the Todo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Todo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Todo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
