<?php
?>
<?= Yii::t('mail', 'Thank you for requesting your project with us. Below is an overview of what you have requested. We will contact you as soon as possible when we have accepted your request.') ?>


<?= Yii::t('request-project', 'One-off costs')?>

<?php 
	$total = 0;
	foreach ($arrays['oneoff'] as $cost) {
		echo $cost->name . ', ' . $cost->description . ' - ', Yii::$app->formatter->asCurrency($cost->price) . '
';
		$total += $cost->price;
	}
?>

<?= Yii::t('request-project', 'Total one-off costs: ') . Yii::$app->formatter->asCurrency($total) ?>


<?= Yii::t('request-project', 'Monthly costs')?>

<?php 
	$total = 0;
	foreach ($arrays['monthly'] as $cost) {
		echo $cost->name . ', ' . $cost->description . ' - ', Yii::$app->formatter->asCurrency($cost->price) . '
		';
		$total += $cost->price;
	}
?>

<?= Yii::t('request-project', 'Total monthly costs: ') . Yii::$app->formatter->asCurrency($total) ?>