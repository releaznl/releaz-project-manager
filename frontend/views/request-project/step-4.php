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
	    
	    <?= $form->field($model, 'informatie'); ?>
	    
	    
	    <?php /* foreach ($category->bidParts as $part) {
	    
	   	echo $form->field($model, $part->attribute_name)->radio([
			'label' => $part->description,
			'value' => $part->id,
			'uncheckValue' => null,
		]); 
	    
	    } */ ?>
	    
	    <?= ''; /*  $form->field($model, 'al_hosting')->radioList(ArrayHelper::map($category->bidParts, 'id', 'description'), ['separator' => '<br>'])->label(false) */ ?>
	    
		
		<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
		
		<?php ActiveForm::end() ?>
	</p>
</div>
