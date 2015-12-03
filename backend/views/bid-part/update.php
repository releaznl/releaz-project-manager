<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BidPart */

$this->title = 'Update Bid Part: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bid Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bid-part-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
