<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Todos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->todo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->todo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
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
                'label' => Yii::t('app','Functionality'),
                'value' => $model->functionality->name,
            ],
            'datetime_added:datetime',
            [
                'label' => Yii::t('app','Creator'),
                'value' => $model->creator->username,
            ],
            'datetime_updated:DateTime',
            [
                'label' => Yii::t('app','Updater'),
                'value' => $model->updater->username,
            ],
            'status_id',
            'deleted:boolean',
        ],
    ]) ?>

</div>
