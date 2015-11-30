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
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->functionality_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->functionality_id], [
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
            'functionality_id',
            'description',
            'datetime_added',
            //'deleted',
            //'project_id',
        	[
        		'label' => Yii::t('project','Project'),
        		'value' => $model->project->description,
    		],
            'name',
            //'creator_id',
        	[
        		'label' => Yii::t('user','Creator'),
        		'value' => $model->creator->username,
    		],
            'datetime_updated',
            //'updater_id',
        	[
        		'label' => Yii::t('user','Updater'),
        		'value' => $model->updater->username,
    		], 
        ],
    ]) ?>

</div>
