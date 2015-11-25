<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\File */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->file_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'file_id',
            'name',
            'description',
            'datetime_added:datetime',
            [
                'label' => 'Creator',
                'value' => $model->creator->username,
            ],
            [
                'label' => 'Todo',
                'value' => $model->todo->description,
            ],
            [
                'label' => 'Project',
                'value' => $model->project->description,
            ],
            'datetime_updated:datetime',
            // 'updater_id',
            [
                'label' => 'Updater',
                'value' => $model->updater->username,
            ],
            'deleted:boolean',
        ],
    ]) ?>

</div>
