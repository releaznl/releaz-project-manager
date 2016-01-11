<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ContactMoment */

$this->title = Yii::t('app', 'Create Contact Moment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Moments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-moment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'customers' => $customers,
    ]) ?>

</div>
