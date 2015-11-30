<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('todo','Todos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->todo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->todo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'todo_id',
            'name',
            'description',
            // 'functionality_id',
            [
                'label' => Yii::t('functionality','Functionality'),
                'value' => $model->functionality->name,
            ],
            'datetime_added:datetime',
            [
                'label' => Yii::t('user','Creator'),
                'value' => $model->creator->username,
            ],
            'datetime_updated:DateTime',
            [
                'label' => Yii::t('user','Updater'),
                'value' => $model->updater->username,
            ],
            'status_id',
            'deleted:boolean',
        ],
    ]) ?>

</div>
