<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="project-registered">
	<p><?= Yii::t('mail', 'There is a new project registered.') ?></p>
	
	<p><?= Html::a(Yii::t('mail', 'View the project here'), Url::to(['/project/view', 'id' => $project->project_id], true)) ?></p>
</div>