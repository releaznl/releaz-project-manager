<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\File */

$this->title = $model->name;

if (isset($model->project_id)) {
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
	$this->params['breadcrumbs'][] = ['label' => $model->project->description, 'url' => ['/project/view', 'id' => $model->project_id]];
	$this->params['breadcrumbs'][] = $this->title;
} else  {
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->functionality->project->description, 'url' => ['/project/view', 'id' => $model->todo->functionality->project_id]];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->functionality->name, 'url' => ['/functionality/view', 'id' => $model->todo->functionality_id]];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->name, 'url' => ['/todo/view', 'id' => $model->todo_id]];
	$this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'projects' => $projects,
    	'todos' => $todos,
    ]); ?>

</div>
