<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = 'Update Todo: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Todos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->todo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>