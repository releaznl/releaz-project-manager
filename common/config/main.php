<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'language' => 'nl',
    'components' => [
    	'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    	'i18n' => [
    		'translations' => [
    			'functionality' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'about' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'app' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'common' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'contact' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'customer' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'error' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'file' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'login' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'loginform' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'logout' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'project' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'todo' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'user' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'yii' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'site' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    			'navbar' => [
    				'class' => 'yii\i18n\PhpMessageSource',
    				'basePath' => '@common/messages',
    			],
    		]
    	]
    ],
];
