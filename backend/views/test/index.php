<?php

/* @var $this yii\web\View */

$this->title = 'Test';
?>
<div class="site-index">

	<div class="body-content">

		<div class="row">
			<div class="col-lg-12">
				<h2>Testmails</h2>

				<p>Hier kunnen alle emails getest worden,
					als je geen informatie wil zien over waar de email heen gaat en wat het onderwerp is dan moet je de info parameter weghalen of in een 0 veranderen.</p>

				<?= \yii\bootstrap\Html::a('Registratie inschrijver', ['test/registration-notify-applicant', 'id' => 1, 'info' => true], ['class' => "btn btn-default"]); ?>
				<?= \yii\bootstrap\Html::a('Ideal inschrijver', ['test/registration-ideal', 'id' => 1, 'info' => true], ['class' => "btn btn-default"]); ?>
				<?= \yii\bootstrap\Html::a('Registratie admin', ['test/registration-notify-admin', 'id' => 1, 'info' => true], ['class' => "btn btn-default"]); ?>
			</div>
		</div>

	</div>
</div>
