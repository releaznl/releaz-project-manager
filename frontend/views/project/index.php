<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= (\Yii::$app->user->can('createProject')) ? Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) : Html::a(''); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'description',
            'datetime_added',
            //'deleted',
            'creator.username',
            'client.username',
            'projectmanager.username',
            'datetime_updated',
            'updater.username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
