<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMoment */

$this->title = 'Update Contact Moment: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact Moments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-moment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
