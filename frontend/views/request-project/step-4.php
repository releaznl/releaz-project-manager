<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;

?>
<div>
	<h1><?php echo $category->name ?></h1>
	
	<p><?php echo $category->description ?></p>
	
	<p>
	    <?php $form = ActiveForm::begin();?>
	    
	    <?= $form->field($model, 'information'); ?>
	    
		<?= $form->field ($model, 'selectedBidPart')->radioList(ArrayHelper::map($category->bidParts, 'id', 'description'), ['separator' => '<br>'])->label(false) ?>
		
		<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
		
		<?php ActiveForm::end() ?>
	</p>
</div>
