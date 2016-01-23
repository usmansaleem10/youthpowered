<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
require_once('constants.php');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Project',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',
                'application.modules.badger.models.*',
                'application.modules.membership.models.*',
                'application.modules.registration.models.*',
                'application.modules.friendship.models.*',
                'application.modules.profile.models.*',
                'application.modules.role.models.*',
                'application.modules.usergroup.models.*',
                'application.modules.message.models.*',
                'application.modules.avatar.models.*',
                'application.modules.newsletter.models.*',
                'application.modules.userproject.models.*',
                'application.modules.userprojectresources.models.*'
	),

	'defaultController'=>'user',
        'modules' => array(
        'user' => array(),
        'Badge' => array(),
        'profile' => array(),
        'membership' => array(),
        'registration' => array(),
        'friendship' => array(),
        'role' => array(),
        'usergroup' => array(),
        'message' => array()   ,
        'avatar' => array(),
        'usertype'=> array(),  
        'newsletter'=> array(),
        'usercomments'=> array(),
        'usercommentslikes'=> array(),
        'userproject'=> array(), 
        'userprojectresources' => array(),
        'userdocuments' => array(),
        'userdocumentsprojects' => array(),    
            'badger' => array(
                  //'layout' => '//layouts/mainx', //default: "//layouts/main"
                  //'userTable' => 'userx', // default: "user"
                  'cacheSec' => 3600 * 24, // cache duration. default: 3600
 
                  // Creates tables and copy necessary files
//                  'install' => true, // remove/comment after succesful install
//                   // drop all badger tables before installing (fresh install)
//                  'dropBeforeInstall' => false, 
            ),
        'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        ),
    
    
	// application components
//	'components'=>array(
////		'user'=>array(
////			// enable cookie-based authentication
////			'allowAutoLogin'=>true,
////		),
////            
////                'user'=>array(
////                'class' => 'application.modules.user.components.YumWebUser',
////                'allowAutoLogin'=>true,
////                'loginUrl' => array('//user/user/login'),
////                    
//                    
//                    
//                    
//                ),    
     
    'components' => array
        (
        'cache' => array('class' => 'system.caching.CDummyCache'),
                'user' => array
                    (
                        'class' => 'application.modules.user.components.YumWebUser',
                        'allowAutoLogin' => true,
                        'loginUrl' => array('user/login'),
                    ),
                    'db'=>array(
                    'class'=>'CDbConnection',
                    'connectionString'=>'mysql:host=localhost;dbname=youthpower',
                    'tablePrefix' => '',
                    'username'=>'root',
                    'password'=>''
                ),
//        'db'=>array(
//			'connectionString' => 'sqlite:protected/data/blog.db',
//			'tablePrefix' => 'tbl_',
//		),
                
        
//        'db'=>array(
//			'connectionString' => 'sqlite:protected/data/blog.db',
//			'tablePrefix' => 'tbl_',
//		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=blog',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		*/'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        //'class' => 'CurlManager',
                        //'enablePrettyUrl' => true,
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
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
		),),
    'params'=>require(dirname(__FILE__).'/params.php'),
	);

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
