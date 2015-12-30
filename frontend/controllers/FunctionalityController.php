<?php

namespace frontend\controllers;

use Yii;

use common\models\Functionality;
use common\models\Todo;

use frontend\components\web\FrontendController;

use yii\base\Model;

use yii\data\ActiveDataProvider;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use yii\behaviors\TimestampBehavior;

use yii\db\ActiveRecord;

use yii\db\Expression;

/**
 * FunctionalityController implements the CRUD actions for Functionality model.
 */
class FunctionalityController extends FrontendController
{

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => 'datetime_created',
					ActiveRecord::EVENT_BEFORE_UPDATE => 'datetime_updated',
				],
				'value' => new Expression('NOW()'),
			],
			'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'delete' => ['post'],
					],
			],
		];
	}
	
    /**
     * Lists all Functionality models.
     * @return mixed
     */
    public function actionIndex()
    {
    	return $this->redirect(['/project']);
    }

    /**
     * Displays a single Functionality model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
    	
    	if (Yii::$app->user->can('viewProject', ['project' => $model->project], false)) {
	  		$todo = new Todo();
	    	$todo->creator_id = Yii::$app->user->id;
	    	$todo->updater_id = Yii::$app->user->id;
	    	$todo->deleted = false;
	    	$todo->functionality_id = $id;
	    		
	    	if ($todo->load(Yii::$app->request->post()) && $todo->save(false)) {
	    		\Yii::$app->getSession()->setFlash('success', Yii::t('todo', 'Todo saved'));
	    		$todo = new Todo();
	    		$todo->creator_id = Yii::$app->user->id;
	    		$todo->updater_id = Yii::$app->user->id;
	    		$todo->deleted = false;
	    		$todo->functionality_id = $id;
	    	}
	    	
	    	$dataProvider = new ActiveDataProvider([
	    			'query' => Todo::find()->andWhere(['or', ['functionality_id' => $id]]),
	    	]);
	    	
	        return $this->render('view', [
	            'model' => $model,
	        	'dataProvider' => $dataProvider,
	        	'todo' => $todo,
	        ]);
    	}
    	throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Functionality model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
    	$functionalities = [new Functionality()];
    	
    	if (Yii::$app->request->isPost) {
    		$functionalitydata = Yii::$app->request->post('Functionality', []);
    		$count = count($functionalitydata);
    		
    		for ($i = 1; $i < $count; $i++) {
    			$functionalities[] = new Functionality();
    		}
    		
    		$functionality = reset($functionalities);
    		foreach ($functionalitydata as $data) {
    			$functionality->load($data, '');
    			$functionality->project_id = $pid;
    			$functionality = next($functionalities);
    		}
    		
    		$valid = true;
    		foreach ($functionalities as $functionality) {
    			$valid = $functionality->validate() && $valid;
    		}
    		
    		if ($valid) {
    			$success = true;
    			foreach($functionalities as $functionality) {
    				if (!$functionality->save()) {
    					$success = false;
    					break;
    				}
    			}
    			
    			if ($success) {
    				return $this->redirect(['project/view', 'id' => $pid]);
    			}
    		}
    	}
    	return $this->render('create', ['models' => $functionalities, 'pid' => $pid]);
    }

    /**
     * Updates an existing Functionality model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->functionality_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Functionality model.
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
     * Finds the Functionality model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Functionality the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Functionality::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModels($pid) {
    	if (($models = Functionality::findAll(['project_id' => $pid])) != null) {
    		return $models;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
}
