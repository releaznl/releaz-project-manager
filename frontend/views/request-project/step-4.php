 <?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;
use common\models\BidPart;

?>
<div>
	<h1><?php echo $category->name ?></h1>
	
	<div class="col-sm-6">
	    <?php $form = ActiveForm::begin();?>
	    
	    <?= $form->field($model, 'informatie')->textInput()->label(BidPart::find()->where(['attribute_name' => 'informatie'])->one()->getLabel()); ?>
	    
		
    	<?= Html::a(Yii::t('common','Last step'), ['step-3'], ['class' => 'btn btn-primary']) ?>
		<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
		
		<?php ActiveForm::end() ?>
	</div>

	<div class="col-sm-6"><?php echo $category->description ?></div>
</div>