<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'file_id',
            'name',
            'description',
            'datetime_added',
            'deleted',
            // 'creator_id',
            // 'todo_id',
            // 'project_id',
            // 'datetime_updated',
            // 'updater_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
