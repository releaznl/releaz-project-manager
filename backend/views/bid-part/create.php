<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BidPart */

$this->title = 'Create Bid Part';
$this->params['breadcrumbs'][] = ['label' => 'Bid Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-part-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
