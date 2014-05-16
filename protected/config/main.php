<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Магазин_электронных_товаров',
    'sourceLanguage' => 'en',
    'language'=>'ru',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'ext.yiiext.components.shoppingCart.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	'user'=>array(
      'hash' => 'md5',
      'sendActivationMail' => true,
      'loginNotActiv' => false,
      'activeAfterRegister' => false,
      'autoLogin' => true,
      'registrationUrl' => array('/user/registration'),
      'recoveryUrl' => array('/user/recovery'),
      'loginUrl' => array('/user/login'),
      'returnUrl' => array('/user/profile'),
      'returnLogoutUrl' => array('/user/login'),
    ),	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'snales11',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
		//	'ipFilterfs'=>array('localhost','::1'),
		),
		
	),

	// application components
	'components'=>array(
    'session' => array(
        'autoStart' => true,
        'savePath' => 'C:\\tmp',
    ),      
		'user'=>array(
			// enable cookie-based authentication
		  'class' => 'WebUser', 
       
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/ /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database*/
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=shop',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix'=>'tbl_',
            
		),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'snales11@mail.ru',
	),
);