<?php
use yii\helpers\Url;
?>

<?= Yii::t('mail', 'There is a new project registered') ?>

<?= Yii::t('mail', 'Open the following URL to see it') ?>

<?= Url::to(['/project/view', 'id' => $project->project_id]) ?>