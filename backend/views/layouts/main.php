<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common','My Company'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
    	['label' => Yii::t('app', 'Controllers'), 'items' => [
	    	['label' => Yii::t('app','Bid Categories'), 'url' => ['/bid-category/index']],
	    	['label' => Yii::t('app','Bid Parts'), 'url' => ['/bid-part/index']],
	        ['label' => Yii::t('app','Contact Moments'), 'url' => ['/contact-moment/index']],
	        ['label' => Yii::t('app','Customers'), 'url' => ['/customer/index']],
	        ['label' => Yii::t('app','Files'), 'url' => ['/file/index']],
	        ['label' => Yii::t('app','Functionalities'), 'url' => ['/functionality/index']],
	        ['label' => Yii::t('app','Meetings'), 'url' => ['/meeting/index']],
	        ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']],
	        ['label' => Yii::t('app','Todos'), 'url' => ['/todo/index']],
	        ['label' => Yii::t('app','Users'), 'url' => ['/user/index']],
    	]]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('login','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::t('logout','Logout (') . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
