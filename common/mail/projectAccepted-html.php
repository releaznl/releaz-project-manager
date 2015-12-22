<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p><?= Yii::t('mail', 'Hello') . ' ' . Html::encode($user->username) ?>,</p>

	<p><?= Yii::t('mail', 'The project you have requested has been accepted.')?></p>

    <p><?= Yii::t('mail', 'Follow the link below to set your password and activate your account:'); ?></p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
