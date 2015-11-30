<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = Yii::t('todo','Create Todo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('todo','Todos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
