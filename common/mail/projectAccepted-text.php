<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<?= Yii::t('mail', 'Hello') . ' ' . $user->username ?>,

<?= Yii::t('mail', 'The project you have requested has been accepted.')?>

<?= Yii::t('mail', 'Follow the link below to set your password and activate your account:'); ?>

<?= $resetLink ?>