<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('todo','Todos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('todo','Create Todo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'todo_id',
            'functionality.name',
            'name',
            'description',
            'status_id',
            'datetime_added:datetime',
            'creator.username',
            'datetime_updated:datetime',
            'updater.username',
            'deleted:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
