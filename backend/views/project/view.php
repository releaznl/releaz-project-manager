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
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$users = User::find()->all();
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->project_id], [
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
            // 'project_id',
            'description',
            'datetime_added:datetime',
            'deleted:boolean',
            [
                'label' => 'Creator', 
                'value' => $model->creator->username,
            ],
            [
                'label' => 'Client',
                'value' => $model->client->username,
            ],
            [
                'label' => 'Project manager',
                'value' => $model->projectmanager->username,
            ],
            'datetime_updated:datetime',
            [
                'label' => 'Updater',
                'value' => $model->updater->username,
            ],
        ],
    ]) ?>
    
    <h2><?Yii::t('app','Functionalities for this project')?></h2>
    
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
