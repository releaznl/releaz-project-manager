<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use common\models\User;
use common\models\Functionality;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title); $users = User::find()->all(); ?></h1>

    <p>
        <?= (Yii::$app->user->can('editProject')) ? Html::a('Update', ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) : Html::a('') ?>
        <?= (Yii::$app->user->can('editProject')) ? Html::a('Add functionality', ['functionality/create', 'pid' => $model->project_id], ['class' => 'btn btn-success']) : Html::a('') ?>
        <?= (Yii::$app->user->can('editProject')) ? Html::a('Delete', ['delete', 'id' => $model->project_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : Html::a('') ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'project_id',
            'description',
            'datetime_added:datetime',
            //'creator_id',
            [
                'label' => 'Creator',
                'value' => $model->creator->username,
            ],
            // 'client_id',
            [
                'label' => 'Client',
                'value' => $model->client->username,
            ],
            // 'projectmanager_id',
            [
                'label' => 'Projectmanager',
                'value' => $model->projectmanager->username,
            ],
            'datetime_updated:datetime',
            [
                'label' => 'Updater',
                'value' => $model->updater->username,
            ],
            // 'updater_id',
        ],
    ]) ?>
    
    <h2>Functionalities for this project</h2>
    
	<?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => Functionality::findNonDeleted(['project_id' => $model->project_id])->with('creator', 'updater')
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
            
            ['class' => 'yii\grid\ActionColumn',
            	'controller' => 'functionality']
        ]
    ]);
    
    ?>

</div>
