<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'Gestor de Incidencias',
        'language' => 'es',	
        'theme'=>'tpl_mantenimiento',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.right.*',
		'application.modules.rights.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'berni',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user'=>array(
			'tableUsers' => 'users',
			'tableProfiles' => 'profiles',
			'tableProfileFields' => 'profiles_fields',
		
		),
		'rights'=>array(
			//'install'=>true,
			'appLayout'=>'//layouts/main',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
		),
		                                                        
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',                                                        
			'defaultRoles'=>array('Guest','Authenticated'),
		),
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=test',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
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
		'adminEmail'=>'bernardo.chenlo@gmail.com',                                                        
	),
);