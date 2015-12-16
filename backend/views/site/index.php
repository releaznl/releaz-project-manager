<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('site','Backend projectmanager application');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to('http://yiitest.front/')?>">Go to frontend</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['bid-category/index']) ?>"><?= Yii::t('app', 'Bid Categories') ?> &raquo;</a></p>
            </div>
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['bid-part/index']) ?>"><?= Yii::t('app', 'Bid Parts') ?> &raquo;</a></p>
            </div>
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['customer/index']) ?>"><?= Yii::t('app', 'Customers') ?> &raquo;</a></p>
            </div>
        	<div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['user/index']) ?>"><?= Yii::t('app', 'Users') ?> &raquo;</a></p>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['file/index']) ?>"><?= Yii::t('app', 'Files') ?> &raquo;</a></p>
            </div>
            
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['project/index']) ?>"><?= Yii::t('app', 'Projects') ?> &raquo;</a></p>
            </div>
          	<div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['functionality/index']) ?>"><?= Yii::t('app', 'Funcionalities') ?> &raquo;</a></p>
            </div>
            
            <div class="col-lg-3">

                <p><a class="btn btn-default" href="<?= Url::to(['todo/index']) ?>"><?= Yii::t('app', 'Todos') ?> &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
