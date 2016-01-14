<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMoment */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contact Moment',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Moments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contact-moment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'customers' => $customers,
    	'customer' => $customer,
    ]) ?>

</div>
