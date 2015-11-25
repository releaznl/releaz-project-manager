<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */

$this->title = 'Update Functionality: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Functionalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->functionality_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="functionality-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
