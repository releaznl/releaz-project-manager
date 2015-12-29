<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user','Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if ($model->isProjectManager()) {
        	echo Html::a(Yii::t('common','Make projectmanager'), ['make-projectmanager', 'uid' => $model->id], [
        			'class' => 'btn btn-warning',
        			'data' => [
        					'confirm' => Yii::t('common','Are you sure you want to promote this user to projectmanager?'),
        					'method' => 'post',
        			],
        	]);
        } else {
        	echo Html::a(Yii::t('common','Remove projectmanager status'), ['remove-projectmanager', 'uid' => $model->id], [
        			'class' => 'btn btn-warning',
        			'data' => [
        					'confirm' => Yii::t('common','Are you sure you want remove the projectmanager status from this user?'),
        					'method' => 'post',
        			],
        	]);
        }
        ?>
        
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'username',
            'password_hash',
            'role_id',
            'auth_key',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
