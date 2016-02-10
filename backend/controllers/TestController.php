<?php
namespace backend\controllers;

use common\models\Project;
use common\models\Functionality;
use common\models\BidPart;
use yii\data\ArrayDataProvider;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Test controller
 */
class TestController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

	/**
	 * Notify the applicant that a registration has been made
	 */
	public function actionNewProject($id = 1, $info = false)
	{
		$project = Project::findOne($id);

		if ($info) {
			var_dump([
				'to'      => $registration->applicant->email,
				'cc'      => '',
				'bcc'     => ['info@releaz.nl', 'edo@releaz.nl'],
				'from'    => [Yii::$app->params['infoEmail'] => 'De Lauwer'],
				'subject' => Yii::t('registration', 'Your registration'),
				'attachment' => Yii::getAlias('@terms_conditions_pdf'),
			]);
		}

		$this->layout = '@common/mail/layouts/html';
		return $this->render('@common/mail/newProjectRegistered-html', [
			'project' => $project,
		]);
	}

	/**
	 * Notify the admin that a registration has been made
	 */
	public function actionMailOverview($id = 1, $info = false)
	{
		$oneOffDataProvider = BidPart::find()->where(['attribute_name' => 'oneoff_costs'])->one();
                $monthlyDataProvider = BidPart::find()->where(['attribute_name' => 'monthly_costs'])->one();

		if ($info) {
			var_dump([
				'to'      => Yii::$app->params['infoEmail'],
				'cc'      => '',
				'bcc'     => ['info@releaz.nl', 'edo@releaz.nl'],
				'from'    => [Yii::$app->params['infoEmail'] => 'De Lauwer'],
				'subject' => Yii::t('registration', 'New registration notification')
			]);
		}

		$this->layout = '@common/mail/layouts/html';
		return $this->render('@common/mail/overviewMail-html', [
			'oneOffDataProvider' => $oneOffDataProvider,
                        'monthlyDataProvider' => $monthlyDataProvider,
		]);
	}

	public function actionFunctionalities($id = 3)
        {
            $project = Project::findOne($id);
            
            $monthly = Functionality::findAll(['project_id' => $id, 'monthly_costs' => 1]);
            $once = Functionality::findAll(['project_id' => $id, 'monthly_costs' => 0]);
                        
            $oneOffDataProvider = new ArrayDataProvider(['allModels' => $once]);      
            $monthlyDataProvider = new ArrayDataProvider(['allModels' => $monthly]);
            
            $this->layout = '@common/mail/layouts/html';
            
            return $this->render('@common/mail/overviewMail-html', [
			'oneOffDataProvider' => $oneOffDataProvider,
                        'monthlyDataProvider' => $monthlyDataProvider,
		]);
       }


}