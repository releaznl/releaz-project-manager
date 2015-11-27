<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Functionalities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functionality-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->functionality_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete') ['delete', 'id' => $model->functionality_id], [
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
            //'functionality_id',
            'name',
            'description',
            'project.description',
            'datetime_added:datetime',
            //'project_id',
            //'creator_id',
            [
                'label' => Yii::t('app','Creator'),
                'value' => $model->creator->username,
            ],
            'datetime_updated:datetime',
            //'updater_id',
            [
                'label' => Yii::t('app','Updater'),
                'value' => $model->updater->username,
            ],
            'deleted:boolean',
        ],
    ]) ?>

</div>
