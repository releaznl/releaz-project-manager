<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BidCategory */

$this->title = 'Create Bid Category';
$this->params['breadcrumbs'][] = ['label' => 'Bid Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
