<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;

?>
<h1><?php echo $category->name ?></h1>

<p><?php echo $category->description ?></p>

<p>
    <?php $form = ActiveForm::begin();?>
    
    <?= $form->field($model, 'content')->fileInput();?>
	
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
	
	<?php ActiveForm::end() ?>
</p>
