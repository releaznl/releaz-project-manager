<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Functionality;

use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project','Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$users = User::find()->all();
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->project_id], [
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
            // 'project_id',
            'description',
            'datetime_added:datetime',
            'deleted:boolean',
            [
                'label' => Yii::t('user','Creator'), 
                'value' => $model->creator->username,
            ],
            [
                'label' => Yii::t('customer','Client'),
                'value' => $model->client->name,
            ],
            [
                'label' => Yii::t('user','Project manager'),
                'value' => $model->projectmanager->username,
            ],
            'datetime_updated:datetime',
            [
                'label' => Yii::t('user','Updater'),
                'value' => $model->updater->username,
            ],
        ],
    ]) ?>
    
    <h2><?Yii::t('project','Functionalities for this project')?></h2>
    
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Functionality::find(['project_id' => $model->project_id])->with('creator', 'updater')
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            'description',
            'datetime_added:datetime',
            'creator.username',
            'datetime_updated:datetime',
            'updater.username',
            'deleted:boolean',
            
            ['class' => 'yii\grid\ActionColumn', 'controller' => 'functionality']
        ]
    ]);
    
    ?>

</div>
