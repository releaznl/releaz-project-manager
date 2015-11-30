<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = Yii::t('project','Update Project: ') . ' ' . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project','Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('common','Update');
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
