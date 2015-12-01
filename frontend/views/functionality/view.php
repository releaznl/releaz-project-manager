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
            'name',
            'description',                        
        	[
        		'attribute' => 'project_id', 
                        'format' => 'raw',
        		'value' => Html::a($model->project->description, ['project/view', 'id' => $model->project_id]),
    		],
        	[
        		'label' => Yii::t('user','Creator'),
        		'value' => $model->creator->username,
    		],            
        ],
    ]) ?>

</div>
