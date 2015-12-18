<?php

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;
use common\models\BidCategory;
use common\models\BidPart;
use common\models\Project;
use common\models\Functionality;
use common\models\Todo;
use common\models\Customer;
use common\models\User;
use common\models\File;
use frontend\models\requestproject\StrategyForm;
use frontend\models\requestproject\DesignForm;
use frontend\models\requestproject\PlanningForm;
use frontend\models\requestproject\HostingForm;
use frontend\models\requestproject\PromotionForm;
use frontend\models\SignupForm;
use yii\base\Object;
use yii\data\ArrayDataProvider;

class RequestProjectController extends \yii\web\Controller
{
	public $tempFileLocation = 'uploads/temp/';
	public $permFileLocation = 'uploads/projects/';
	
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
    	
    	if ($model->load(Yii::$app->request->post())) {
    		$model->current_style = UploadedFile::getInstance($model, 'current_style');
    		if ($model->validate()) {
    			if ($model->current_style) {
	    			$model->current_style->saveAs($this->tempFileLocation . $model->current_style->baseName . '.' . $model->current_style->extension);
    			}
    			
	    		Yii::$app->session->set('part2', $model);
	    		return $this->redirect('/request-project/step-3');
    		}
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
    	if (!Yii::$app->session->has('part4')) 
    	{
    		return $this->redirect('/request-project/step-4');
    	}
    	
    	$model = Yii::$app->session->get('part5', new PromotionForm());
    	$category = BidCategory::find()->where(['ordering' => 5])->one();
    	
    	if ($model->load(Yii::$app->request->post())) 
    	{
    		if ($model->validate()) 
    		{
	    		Yii::$app->session->set('part5', $model);
	    		
	    		if (Yii::$app->user->isGuest) {
		    		return $this->redirect('/request-project/create-user');
	    		} else {
	    			return $this->redirect('/request-project/overview');
	    		}
    		}
    	}
    	
        return $this->render('step-5', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }
    
    public function actionOverview()
    {
    	if (Yii::$app->session->has('part1')
    			&& Yii::$app->session->has('part2')
    			&& Yii::$app->session->has('part3')
    			&& Yii::$app->session->has('part4')
    			&& Yii::$app->session->has('part5')) 
    	{
	    	return $this->render('overview', [
	    			'dataProvider' => new ArrayDataProvider([
	    					'allModels' => $this->getStepsAsBidPartArray(),
	    			]),
	    	]);
    	} else {
//     		Yii::$app->session->setFlash('error', Yii::t('request_project', 'You have missed a part of the form, please check to see if you have entered the correct information.'));
    		return $this->redirect(['/request-project/step-5']);
    	}
    	
    }
    
    public function actionGenerateProject() 
    {
    	if (Yii::$app->session->has('part1')
    			&& Yii::$app->session->has('part2')
    			&& Yii::$app->session->has('part3')
    			&& Yii::$app->session->has('part4')
    			&& Yii::$app->session->has('part5')) 
    	{
    		$this->generateProject();
    		return $this->redirect('/request-project/completion');
    	}
    	return $this->redirect('/request-project/overview');
    }

    public function actionCreateUser() 
    {
    	$model = new SignupForm();
    	
    	if ($model->load(Yii::$app->request->post())) {
    		if ($user = $model->signup()) {
    			if (Yii::$app->getUser()->login($user)) {
    				return $this->redirect('/request-project/overview');
    			}
    		}
    	}
    	
    	return $this->render('/site/signup', [
    			'model' => $model,
    	]);
    }
    
    private function getStepsAsBidPartArray() 
    {
    	$result = array();
    	
    	$steps[0] = Yii::$app->session->get('part1');
    	$steps[1] = Yii::$app->session->get('part2');
    	$steps[2] = Yii::$app->session->get('part3');
    	$steps[3] = Yii::$app->session->get('part4');
    	$steps[4] = Yii::$app->session->get('part5');
    	
    	foreach ($steps as $step) 
    	{
    		foreach($step->attributes as $key => $attribute) 
    		{
    			if (!empty($attribute)) 
    			{
    				$result[] = $part = BidPart::find()->where(['attribute_name' => $key])->one();
    			}
    		}
    	}
    	
    	return $result;
    }
    
    private function generateProject() 
    {
    	// Get the Parts
    	$steps = array();
    	
    	$steps[0] = Yii::$app->session->get('part1');
    	$steps[1] = Yii::$app->session->get('part2');
    	$steps[2] = Yii::$app->session->get('part3');
    	$steps[3] = Yii::$app->session->get('part4');
    	$steps[4] = Yii::$app->session->get('part5');
    	
    	// Create Project
    	$project = new Project();
    	$customer = Customer::find()->where(['user_id' => Yii::$app->user->id])->one();
    	
    	$project->client_id = $customer->customer_id;
    	$project->projectmanager_id = User::getProjectmanagers()[0]->id;
    	$project->status = 0;
    	$project->name = $customer->name;
    	$project->deleted = 0;
    	$project->description = 'Doel van de website: ' . $steps[1]->goal;
    	
    	$project->save();
    	
    	mkdir($this->permFileLocation . $project->project_id . '/');
    	
    	foreach ($steps as $step) 
    	{
    		$this->saveFunctionalities($step, $project->project_id);
    	}
    	
    	// Unset all steps in _SESSION
    	Yii::$app->session->remove('part1');
    	Yii::$app->session->remove('part2');
    	Yii::$app->session->remove('part3');
    	Yii::$app->session->remove('part4');
    	Yii::$app->session->remove('part5');
    	
    	// Notify the admin
    	$user = $project->projectmanager;
    	$mail = Yii::$app->mailer->compose(['html' => 'newProjectRegistered-html', 'text' => 'newProjectRegistered-text'], ['customer' => $customer, 'project' => $project]);
    	$mail->setFrom('noreply@releaz.nl');
    	$mail->setTo($user->email);
    	$mail->setSubject('Er is een nieuw project aangevraagd door ' . $customer->name);
    	
    	$mail->send();
    	
    	return $project;
    }
    
    public function actionCompletion() {
    	return $this->render('completion');
    }
    
    private function saveFunctionalities($step, $project_id) {
    	
    	foreach($step->attributes as $key => $attribute) {
    		if (!empty($attribute)) {
	    		$bidpart = BidPart::find()->where(['attribute_name' => $key])->one();
	    		
	    		if ($bidpart->file_upload) {
	    			$file = new File();
	    			
	    			$file->name = $attribute->baseName . '.' . $attribute->extension;
	    			$file->description = $bidpart->description;
	    			$file->project_id = $project_id;
	    			$file->todo_id = null;
	    			$file->deleted = 0;
		    		
	    			$file->save();
	    			
	    			rename($this->tempFileLocation . $file->name, $this->permFileLocation . $project_id . '/' . $file->name);
	    			
	    		} else {
		    		$functionality = new Functionality();
		    		
		    		$functionality->name = $bidpart->name;
		    		$functionality->description = $attribute;
		    		$functionality->project_id = $project_id;
		    		$functionality->deleted = 0;
		    		$functionality->amount = 1;
		    		$functionality->price = round($bidpart->price, 2);
		    		
		    		$functionality->save();
	    		}
    		}
    	}
    }
}
