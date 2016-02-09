<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = $category->name;

?>

<h1><?php echo $category->name ?></h1>

<ul class="steps">
    <li class="active"><span>Stap 1</span><?= Html::a(Yii::t('request-project', 'Strategy'), ['/request-project/step-1'])?></li>
    <li class="active"><span>Stap 2</span><?= Html::a(Yii::t('request-project', 'Design'), ['/request-project/step-2'])?></li>
    <li><span>Stap 3</span><?= Html::a(Yii::t('request-project', 'Planning'), ['/request-project/step-3'])?></li>
    <li><span>Stap 4</span><?= Html::a(Yii::t('request-project', 'Hosting'), ['/request-project/step-4'])?></li>
    <li><span>Stap 5</span><?= Html::a(Yii::t('request-project', 'Website promotion'), ['/request-project/step-5']) ?></li>
    <li><span>Stap 6</span><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/overview']) ?></li>
</ul>

<div class="col-sm-6">
    <div class="row">
        <div class="block">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            
            <?php echo $form->field($model, 'website1')->textInput(); ?>
            <?php echo $form->field($model, 'website2')->textInput()->label(false); ?>
            <?php echo $form->field($model, 'website3')->textInput()->label(false); ?>
            
            <?php echo $form->field($model, 'goal')->textArea() ?>
            
            <?php // Toevoegen slider ?>
            <?php echo $form->field($model, 'target_audience')->textArea() ?>
            
            <?php echo $form->field($model, 'current_style')->fileInput() ?>
            
            <?= '<span class="warning">' . \Yii::t('request-project','The design of the website will be based on the information entered.') . '</span>' ?>
			
		    <?= $form->field($model, 'comment') ?>
            	
            <?= Html::a(Yii::t('common','Last step'), ['step-1'], ['class' => 'btn btn-primary']) ?>
        	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
        	
        	<?php ActiveForm::end() ?>
        </div>
    </div>
</div>
<div class="col-sm-6">
    <div class="row">
        <div class="block info">
            <?php echo $category->description ?></p>
        </div>
        <div class="call">
            Kom je er niet uit of heb je vragen?<br />
            <a href="tel:+31503015965">050 30 15 965</a>
        </div>
    </div>
</div>