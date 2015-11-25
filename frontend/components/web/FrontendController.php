<?php

namespace frontend\components\web;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class FrontendController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
					[
						'allow' => true,
						'actions' => ['index', 'view'],
						'roles' => ['@', 'projectmanager', 'admin'],
					],
                	[
                		'allow' => true,
                		'actions' => ['update', 'create'],
                		'roles' => ['projectmanager', 'admin'],
                	],
                	[
                		'allow' => true,
                		'roles' => ['admin'],
                	]
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