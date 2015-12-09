<?php

namespace frontend\controllers;

use Yii;
use common\models\BidCategory;
use common\models\BidPart;
use common\models\Project;
use common\models\Functionality;
use common\models\Todo;
use common\models\Customer;
use common\models\User;
use frontend\models\requestproject\StrategyForm;
use frontend\models\requestproject\DesignForm;
use frontend\models\requestproject\PlanningForm;
use frontend\models\requestproject\HostingForm;
use frontend\models\requestproject\ContentForm;
use frontend\models\SignupForm;

class RequestProjectController extends \yii\web\Controller
{
	public $defaultAction = 'step-1';
	
    public function actionStep1()
    {
    	$category = BidCategory::find()->where(['ordering' => 1])->one();
    	$model = Yii::$app->session->get('part1', new StrategyForm());
    	
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		Yii::$app->session->set('part1', $model);
    		return $this->redirect('/request-project/step-2');
    	}
    	
        return $this->render('step-1', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }
    
    public function actionStep2()
    {
    	if (!Yii::$app->session->has('part1')) {
    		return $this->redirect('/request-project/step-1');
    	}
    	
    	$model = Yii::$app->session->get('part2', new DesignForm());
    	$category = BidCategory::find()->where(['ordering' => 2])->one();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		Yii::$app->session->set('part2', $model);
    		return $this->redirect('/request-project/step-3');
    	}
        
        return $this->render('step-2', [
        		'model' => $model,
        		'category' => $category,
        ]);
        
    }

    public function actionStep3()
    {
    	if (!Yii::$app->session->has('part2')) {
    		return $this->redirect('/request-project/step-2');
    	}
    	
    	$model = Yii::$app->session->get('part3', new PlanningForm());
    	$category = BidCategory::find()->where(['ordering' => 3])->one();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		Yii::$app->session->set('part3', $model);
    		return $this->redirect('/request-project/step-4');
    	}
    	
        return $this->render('step-3', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }

    public function actionStep4()
    {
    	if (!Yii::$app->session->has('part3')) {
    		return $this->redirect('/request-project/step-3');
    	}
    	
    	$model = Yii::$app->session->get('part4', new HostingForm());
    	$category = BidCategory::find()->where(['ordering' => 4])->one();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		Yii::$app->session->set('part4', $model);
    		return $this->redirect('/request-project/step-5');
    	}
    	
        return $this->render('step-4', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }

    public function actionStep5()
    {
    	if (!Yii::$app->session->has('part4')) {
    		return $this->redirect('/request-project/step-4');
    	}
    	
    	$model = Yii::$app->session->get('part5', new ContentForm());
    	$category = BidCategory::find()->where(['ordering' => 5])->one();
    	
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    		Yii::$app->session->set('part5', $model);
    		
    		if (Yii::$app->user->isGuest) {
	    		return $this->redirect('/request-project/create-user');
    		} else {
    			$this->generateProject();
    			return $this->redirect('/request-project/completion');
    		}
    	}
    	
        return $this->render('step-5', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }

    public function actionCreateUser() {
    	
    	$model = new SignupForm();
    	
    	if ($model->load(Yii::$app->request->post())) {
    		if ($user = $model->signup()) {
    			if (Yii::$app->getUser()->login($user)) {
    				$this->generateProject();
    				return $this->redirect('/request-project/completion');
    			}
    		}
    	}
    	
    	return $this->render('/site/signup', [
    			'model' => $model,
    	]);
    }
    
    private function generateProject() {
    	
    	// Get the Parts
    	$parts = array();
    	
    	$parts[0] = Yii::$app->session->get('part1');
    	$parts[1] = Yii::$app->session->get('part2');
    	$parts[2] = Yii::$app->session->get('part3');
    	$parts[3] = Yii::$app->session->get('part4');
    	$parts[4] = Yii::$app->session->get('part5');
    	
    	// Create Project
    	$project = new Project();
    	$customer = Customer::find()->where(['user_id' => Yii::$app->user->id])->one();
    	
    	$project->client_id = $customer->customer_id;
    	$project->projectmanager_id = User::getProjectmanagers()[0]->id;
    	$project->status = 0;
    	$project->name = $customer->name;
    	$project->deleted = 0;
    	$project->description = 'Doel van de website: ' . $parts[1]->goal;
    	
    	$project->save();
    	
    	
    	
    	foreach ($parts as $part) {
    		$this->saveAsFunctionalities($part, $project->project_id);
    	}
    	
    	// Unset all steps
//     	Yii::$app->session->remove('part1');
//     	Yii::$app->session->remove('part2');
//     	Yii::$app->session->remove('part3');
//     	Yii::$app->session->remove('part4');
//     	Yii::$app->session->remove('part5');
    	
    	return $project;
    }
    
    public function actionCompletion() {
    	return $this->render('completion');
    }
    
    private function saveAsFunctionalities($part, $project_id) {
    	foreach($part->attributes as $key => $attribute) {
    		$bidpart = BidPart::find(['attribute_name' => $key])->one();
    		
    		$functionality = new Functionality();
    		
    		$functionality->name = $bidpart->name;
    		$functionality->description = $attribute;
    		$functionality->project_id = $project_id;
    		$functionality->deleted = 0;
    		$functionality->amount = 1;
    		$functionality->price = round($bidpart->price, 2);
    		
    		$functionality->save();
//     		var_dump($functionality->getErrors()); exit;
    	}
    }
}
