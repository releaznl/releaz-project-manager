<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Customer;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
    	<?php 
    	if (!(Yii::$app->user->isGuest))
    	{
    		NavBar::begin([
    				'brandLabel' => Yii::t('common','/Kees'),
    				'brandUrl' => Yii::$app->homeUrl,
    				'options' => [
    						'class' => 'navbar-inverse navbar-fixed-top',
    				],
    		]);
    		if (Yii::$app->user->can('createProject')) {
    		
    		$menuItems = [
    				['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
    				['label' => '<span class="glyphicon glyphicon-list"></span>', 'items' => [
    						['label' => Yii::t('app','Projects'), 'url' => ['/project/index']],
    						['label' => Yii::t('app','Contact Moments'), 'url' => ['/contact-moment/index']],
    						['label' => Yii::t('app','Meetings'), 'url' => ['/meeting/index']],
    						['label' => Yii::t('app','Customers'), 'url' => ['/customer/index']],
    						['label' => Yii::t('app','Logout'), 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
    				]]
    		];
    		
    		} else {
    			$menuItems = [
    				['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
    				['label' => '<span class="glyphicon glyphicon-list"></span>', 'items' => [
    						['label' => Yii::t('app','Projects'), 'url' => ['/project/index']],
    						['label' => Yii::t('app','Logout'), 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
    				]]
    		];
    		}
    		echo Nav::widget([
    				'options' => [
    						'class' => 'navbar-nav navbar-right',
    				],
    				'items' => $menuItems,
    				'encodeLabels' => false,
    		]);
    		
    		NavBar::end();
    	}
    	
    	?>
    	
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
