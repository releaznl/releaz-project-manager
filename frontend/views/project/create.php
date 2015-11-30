<?php

use yii\helpers\Html;

$this->title = Yii::t('project','Create Project');
?>
<div class="project-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="content">
		<?=
		$this->render('_form', [
			'model' => $model,
			'user' => $user,
			'customer' => $customer,
		]) ?>
	</div>
</div>