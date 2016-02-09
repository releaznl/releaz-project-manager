<?php

use yii\helpers\Html;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */

$project = Project::findOne(['project_id' => $pid]);

$this->title = Yii::t('functionality','Create Functionality');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $project->description, 'url' => ['/project/view', 'id' => $project->project_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functionality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
