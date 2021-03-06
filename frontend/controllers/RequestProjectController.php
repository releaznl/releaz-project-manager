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
use yii\base\Model;

class RequestProjectController extends \yii\web\Controller
{
	private $tempFileLocation = 'uploads/temp/';
	private $permFileLocation = 'uploads/projects/';
	
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
	    		
	    		return $this->redirect('/request-project/overview');
    		}
    	}
    	
        return $this->render('step-5', [
        		'model' => $model,
        		'category' => $category,
        ]);
    }
    
    public function actionOverview()
    {
    	if ($this->hasAllPartsInSession()) 
    	{
    		$overview = $this->getStepsAsBidPartArray();
    		
	    	return $this->render('overview', [
	    			'oneoffDataProvider' => new ArrayDataProvider([
	    					'allModels' => $overview['oneoff'],
	    			]),
	    			'monthlyDataProvider' => new ArrayDataProvider([
	    					'allModels' => $overview['monthly'],
	    			]),
	    	]);
	    	
    	} else {
    		return $this->redirect(['/request-project/step-5']);
    	}
    }
    
    public function actionGenerateProject($uid) 
    {
    	if ($this->hasAllPartsInSession()) 
    	{
	    		$project = $this->generateProject($uid);
    			$mail = $this->setupOverviewMail($project);
	    		$mail->send();
		    	$this->removeAllStepsFromSession();
	    		return $this->redirect('/request-project/completion');
    	}
    	return $this->redirect('/request-project/overview');
    }
    
    public function actionClearSteps() {
    	$this->removeAllStepsFromSession();
    	$this->redirect(['/site/index']);
    }
    
    private function setupOverviewMail($project)
    {
        $monthly = Functionality::find()->where("price > 1 AND project_id = " . $project->project_id . " AND monthly_costs = 1")->all();//All(['project_id' => $id, 'monthly_costs' => 1],['price','>',1]);
        $once = Functionality::find()->where("price > 1 AND project_id = " . $project->project_id . " AND monthly_costs = 0")->all(); //(['project_id' => $id, 'monthly_costs' => 0],['price','>',1]);                       
        
        $solidCostsMonthly = new Functionality;
        $solidCostsMonthly->name = "Vaste maandelijkse kosten";
        $solidCostsMonthly->price = 39.95;
        array_push($monthly, $solidCostsMonthly);

        $solidCostOnce = new Functionality;
        $solidCostOnce->name = "Vaste eenmalige kosten";
        $solidCostOnce->price = 250;
        array_push($once, $solidCostOnce);
            
        $oneOffDataProvider = new ArrayDataProvider(['allModels' => $once]);      
        $monthlyDataProvider = new ArrayDataProvider(['allModels' => $monthly]);
        
        $totalMonthly = 0;
        foreach ($monthlyDataProvider->allModels as $model) {
            $totalMonthly += $model->price;
        }

        $totalOnce = 0;
        foreach ($oneOffDataProvider->allModels as $model) {
            $totalOnce += $model->price;
        }

        $mail = Yii::$app->mailer->compose([
    			'html' => 'overviewMail-html', 
    			'text' => 'overviewMail-text',
    	],
    	[
    			'oneOffDataProvider' => $oneOffDataProvider,
    			'monthlyDataProvider' => $monthlyDataProvider,
                        'totalMonthly' => $totalMonthly,
                        'totalOnce' => $totalOnce,
    	]);
        
    	$mail->setTo($project->client->email_address);
    	$mail->setFrom(['info@keesonline.nl' => 'Kees Online'] );
    	$mail->setSubject(Yii::t('mail', 'Your request has been noted'));
    	return $mail;
    }

    public function actionCreateUser() 
    {
    	if ($this->hasAllPartsInSession())
    	{
	    	$model = new SignupForm();
	    	
	    	if ($model->load(Yii::$app->request->post())) 
	    	{
	    		if ($user = $model->signup()) 
	    		{
	    			return $this->redirect(['/request-project/generate-project', 'uid' => $user->id]);
	    		}
	    	}
	    	
	    	if (Yii::$app->user->isGuest)
	    	{
		    	return $this->render('/site/signup', [
		    			'model' => $model,
		    	]);
	    	}
	    	
	    	return $this->redirect(['/request-project/generate-project', 'uid' => Yii::$app->user->id]);
    	} else {
    		return $this->redirect(['/request-project/overview']);
    	}
    }
    
    private function getStepsAsBidPartArray() 
    {
    	$result = ['oneoff' => array(), 'monthly' => array()];
    	
    	$result['oneoff'][] = BidPart::find()->where(['attribute_name' => 'oneoff_costs'])->one();
    	$result['monthly'][] = BidPart::find()->where(['attribute_name' => 'monthly_costs'])->one();
    	
    	$steps = $this->getSessionPartsAsArray();
    	
    	if (!$steps) {
    		var_dump($steps); exit;
    	}
    	
    	foreach ($steps as $step) 
    	{
    		foreach($step->attributes as $key => $attribute) 
    		{
    			if ($key != 'comment') 
    			{	
	    			if (!empty($attribute)) 
	    			{
	    				$part = BidPart::find()->where(['attribute_name' => $key])->one();
	    				
	    				if ($part->price != 0) {
		    				if ($part->monthly_costs) {
		    					$result['monthly'][] = $part;
		    				} else {
		    					$result['oneoff'][] = $part;
		    				}
	    				}
	    			}
    			}
    		}
    	}
    	
    	return $result;
    }
    
    private function hasAllPartsInSession() {
    	return (Yii::$app->session->has('part1')
    			&& Yii::$app->session->has('part2')
    			&& Yii::$app->session->has('part3')
    			&& Yii::$app->session->has('part4')
    			&& Yii::$app->session->has('part5'));
    }
    
    private function removeAllStepsFromSession() {
    	Yii::$app->session->remove('part1');
    	Yii::$app->session->remove('part2');
    	Yii::$app->session->remove('part3');
    	Yii::$app->session->remove('part4');
    	Yii::$app->session->remove('part5');
    	Yii::$app->session->remove('customer');
    }
    
    private function getSessionPartsAsArray() {
    	if ($this->hasAllPartsInSession()) {
    				
    		$array = array();
    		
    		$array[0] = Yii::$app->session->get('part1');
    		$array[1] = Yii::$app->session->get('part2');
    		$array[2] = Yii::$app->session->get('part3');
    		$array[3] = Yii::$app->session->get('part4');
    		$array[4] = Yii::$app->session->get('part5');
    		
    		return $array;
    	} else {
    		return null;
    	}
    }
    
    private function generateProject($uid) 
    {
    	// Get the Parts
    	$steps = $this->getSessionPartsAsArray();
    	
    	// Create Project
    	$project = new Project();
    	
    	$user;
    	$customer;
    	$previousUser = false;
    	
    	
    	
    	if (Yii::$app->session->has('customer')) {
    		$customer = Yii::$app->session->get('customer');
    		$user = $customer->user;
    	} else {
    		$user = User::find()->where(['id' => $uid])->one();
    		$customer = Customer::find()->where(['user_id' => $user->id])->one();
    	}
    	
    	// Log in the user temporarily so the project and functionalities get the right creator_id and updater_id
    	if (Yii::$app->user->isGuest) {
	    	Yii::$app->user->login($user);
    	} else {
    		$previousUser = true;
    	}
    	
    	$project->client_id = $customer->customer_id;
    	$project->status = 0;
    	$project->name = $customer->name;
    	$project->deleted = 0;
    	$project->description = 'Doel van de website: ' . $steps[1]->goal;
    	
    	$project->save(false);
    	
    	$location = $this->permFileLocation . $project->project_id . '/';
    	
    	if (!file_exists($location)) {
	    	mkdir($location);
    	}
    	
    	
    	$i = 1;
    	$comments = Yii::t('request-project',' Comments:');
    	foreach ($steps as $step) 
    	{
    		$comment = $this->saveFunctionalities($step, $project->project_id, $uid);
    		
    		if (!empty($comment)) {
    			$comments .= ' ' . Yii::t('request-project', 'Step');
    			$comments .= ' ' . $i . ': ';
    			$comments .= $comment;
    		}
    		
    		$i++;
    	}
    	
    	if ($comments != Yii::t('request-project',' Comments:'))
    	{
	    	$project->description .= $comments;
	    	$project->save(false);
    	}
    	
    	// Log the user out
    	if (!$previousUser) {
    		Yii::$app->user->logout();
    	}
    	
    	// Notify the admin
    	$mail = Yii::$app->mailer->compose(['html' => 'newProjectRegistered-html', 'text' => 'newProjectRegistered-text'], ['customer' => $customer, 'project' => $project]);
    	$mail->setFrom('noreply@releaz.nl');
    	$mail->setTo('info@releaz.nl');
    	$mail->setSubject('Er is een nieuw project aangevraagd door ' . $customer->name);
    	
    	$mail->send();
    	
    	return $project;
    }
    
    public function actionCompletion() {
    	return $this->render('completion');
    }
    
    /**
     * 
     * @param Model $step
     * @param integer $project_id
     * @param integer $uid
     * @return string $comments
     */
    private function saveFunctionalities($step, $project_id, $uid) {
    	$comment = '';
    	
    	foreach($step->attributes as $key => $attribute) 
    	{
    		if (!empty($attribute)) 
    		{
    			if ($key == 'comment') 
    			{
    				$comment = $attribute;
    			}
    			else 
    			{
		    		$bidpart = BidPart::find()->where(['attribute_name' => $key])->one();
		    		
		    		if ($bidpart->file_upload) 
		    		{
		    			$file = new File();
		    			
		    			$file->name = $attribute->baseName . '.' . $attribute->extension;
		    			$file->description = $bidpart->description;
		    			$file->project_id = $project_id;
		    			$file->todo_id = null;
		    			$file->deleted = 0;
		    			$file->creator_id = $uid;
		    			$file->updater_id = $uid;
			    		
		    			$file->save();
		    			
		    			rename($this->tempFileLocation . $file->name, $this->permFileLocation . $project_id . '/' . $file->name);
		    			
		    		} else {
			    		$functionality = new Functionality();
			    		
			    		$functionality->name = $bidpart->name;
			    		$functionality->description = $attribute;
			    		$functionality->project_id = $project_id;
			    		$functionality->deleted = 0;
			    		$functionality->amount = 1;
			    		$functionality->price = $bidpart->price;
			    		$functionality->creator_id = $uid;
			    		$functionality->updater_id = $uid;
                                        $functionality->monthly_costs = $bidpart->monthly_costs;
			    		
			    		$functionality->save(false);
		    		}
    			}
    		}
    	}
    	
    	return $comment;
    }
}
