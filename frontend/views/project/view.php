<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use common\models\User;
use common\models\Functionality;
use common\models\File;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project','Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title); ?></h1>
    
    <div class="block">

    <p>
        <?= (Yii::$app->user->can('editProject')) ? Html::a(Yii::t('common','Update'), ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) : Html::a('') ?>
        <?= (Yii::$app->user->can('editProject') && $model->status == Project::STATUS_REQUESTED) ? Html::a(Yii::t('project','Accept project request'), ['project/accept', 'pid' => $model->project_id], ['class' => 'btn btn-warning']) : Html::a('') ?>
        <?= (Yii::$app->user->can('editProject')) ? Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->project_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) : Html::a('') ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [                      
            [
                'attribute' => 'client_id', //Yii::t('project','Client'),
                'format' => 'raw',
                'value' => Html::a($model->client->name, ['/customer/view', 'id' => $model->client_id]),
            ],
            // 'projectmanager_id',
            [
                'label' => Yii::t('project','Projectmanager'),
                'value' => (($model->projectmanager_id) ? $model->projectmanager->username : $model->projectmanager_id),
            ],
            [
                'label' => Yii::t('project','Creator'),
                'value' => $model->creator->username,
            ],
            'datetime_added:datetime',  
            [
                'label' => Yii::t('project','Updater'),
                'value' => $model->updater->username,
            ],
            'datetime_updated:datetime',
            // 'updater_id',
        ],
    ]) ?>
    
    <h2><?= Yii::t('project','Functionalities for this project') ?></h2>
    
    <p>
        <?= (Yii::$app->user->can('editProject')) ? Html::a(Yii::t('project','Add functionality'), ['functionality/create', 'pid' => $model->project_id], ['class' => 'btn btn-success']) : Html::a('') ?></p>
    
	<?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Functionality::findNonDeleted(['project_id' => $model->project_id])->with('creator', 'updater')
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            'description',
//             'amount',
            'price:currency',
//         	'totalPrice',
        	'todoAmount',
            
            ['class' => 'yii\grid\ActionColumn',
            	'controller' => 'functionality']
        ]
    ]);
    
    ?>
    
    <h2><?= Yii::t('project','Files for this project') ?></h2>
    
    <p><?= Html::a(Yii::t('file', 'Create file'), ['/file/create', 'pid' => $model->project_id], ['class' => 'btn btn-success']); ?></p>
    
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => File::findNonDeleted(['project_id' => $model->project_id])->with('creator', 'updater')
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            'description',
            
            ['class' => 'yii\grid\ActionColumn',
            	'controller' => 'file']
        ]
    ]);
    
    ?>
</div>
</div>
