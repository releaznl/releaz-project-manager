<?php

namespace backend\components\web;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BackendController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                	[
                		'allow' => true,
                		'roles' => ['admin'],
                	],
                	[
                		'allow' => true,
                		'actions' => ['login'],
                		'roles' => ['?']
                	],
                	[
                		'allow' => true,
                		'actions' => ['logout'],
                		'roles' => ['@']
                	],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
}