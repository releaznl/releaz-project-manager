<?php

namespace frontend\controllers;

use Yii;
use common\models\ContactMoment;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Customer;
use common\models\User;
use frontend\components\web\FrontendController;

/**
 * ContactMomentController implements the CRUD actions for ContactMoment model.
 */
class ContactMomentController extends FrontendController
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
     * Lists all ContactMoment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ContactMoment::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactMoment model.
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
     * Creates a new ContactMoment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cid = null)
    {
        $model = new ContactMoment();
        $customer = new Customer();
        
        if ($cid) {
        	$model->customer_id = $cid;
        }

        if ($model->load(Yii::$app->request->post()) && $customer->load(Yii::$app->request->post()) && $this->saveProject($model, $customer)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('create', [
            'model' => $model,
          	'customers' => Customer::find()->all(),
           	'customer' => $customer,
        ]);
    }
    
    private function saveProject($model, $customer) {
    	
    	if (empty($model->customer_id)) {
    	
    		if (!empty($customer->name)) {
    			// Save the project
    	
    			$user = new User();
    			$user->username = $customer->email_address;
    			$user->email = $user->username;
    			$user->status = User::STATUS_AWAITING_REQUEST;
    			 
    			$user->save(false);
    			
    			$customer->user_id = $user->id;
    			 
    			if ($customer->save(false)) {
    				// We can save the contact
    				$model->customer_id = $customer->customer_id;
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
     * Updates an existing ContactMoment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $customer = new Customer();

        if ($model->load(Yii::$app->request->post()) && $customer->load(Yii::$app->request->post()) && $this->saveProject($model, $customer)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            	'customers' => Customer::find()->all(),
            	'customer' => $customer,
            ]);
        }
    }

    /**
     * Deletes an existing ContactMoment model.
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
     * Finds the ContactMoment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactMoment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactMoment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
