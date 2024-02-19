<?php
$config = [
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['maintenance'],
    'modules' => [
        'store' => [
            'class' => 'app\modules\store\Module',
        ],
//        'user' => [
//            'class' => frontend\modules\user\Module::class,
//            'shouldBeActivated' => false,
//            'enableLoginByPass' => false,
//        ],
        'user-management' => [
		'class' => 'webvimark\modules\UserManagement\UserManagementModule',

		// 'enableRegistration' => true,

		// Add regexp validation to passwords. Default pattern does not restrict user and can enter any set of characters.
		// The example below allows user to enter :
		// any set of characters
		// (?=\S{8,}): of at least length 8
		// (?=\S*[a-z]): containing at least one lowercase letter
		// (?=\S*[A-Z]): and at least one uppercase letter
		// (?=\S*[\d]): and at least one number
		// $: anchored to the end of the string

		//'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
		

		// Here you can set your handler to change layout for any controller or action
		// Tip: you can use this event in any module
		'on beforeAction'=>function(yii\base\ActionEvent $event) {
				if ( $event->action->uniqueId == 'user-management/auth/login' )
				{
					$event->action->controller->layout = 'loginLayout.php';
				};
			},
                        'auth_item_table' =>'rbac_auth_item',            
        'auth_item_group_table' =>'rbac_auth_item_group',            
        'auth_item_child_table' =>'rbac_auth_item_child',            
        'auth_assignment_table' =>'rbac_auth_assignment',
        'registrationFormClass' => 'app\models\RegistrationFormWithProfile',  
        'controllerMap' => [
        'user' => 'backend\modules\UserManagement\controllers\UserController',
        ],                        
                'viewPath' => '@backend/views/user-management',                
	],
        'file' => [
            'class' => backend\modules\file\Module::class,
        ],
    ],
    'as ghost-access'=> [
            'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],     
    'components' => [
        'authClientCollection' => [
            'class' => yii\authclient\Collection::class,
            'clients' => [
                'github' => [
                    'class' => yii\authclient\clients\GitHub::class,
                    'clientId' => env('GITHUB_CLIENT_ID'),
                    'clientSecret' => env('GITHUB_CLIENT_SECRET')
                ],
                'facebook' => [
                    'class' => yii\authclient\clients\Facebook::class,
                    'clientId' => env('FACEBOOK_CLIENT_ID'),
                    'clientSecret' => env('FACEBOOK_CLIENT_SECRET'),
                    'scope' => 'email,public_profile',
                    'attributeNames' => [
                        'name',
                        'email',
                        'first_name',
                        'last_name',
                    ]
                ]
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'maintenance' => [
            'class' => common\components\maintenance\Maintenance::class,
            'enabled' => function ($app) {
                if (env('APP_MAINTENANCE') === '1') {
                    return true;
                }
                return $app->keyStorage->get('frontend.maintenance') === 'enabled';
            }
        ],
        'request' => [
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY')
        ],
//        'user' => [
//            'class' => yii\web\User::class,
//            'identityClass' => common\models\User::class,
//            'loginUrl' => ['/user/sign-in/login'],
//            'enableAutoLogin' => true,
//            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class
//        ]
        'user' => [
//		'class' => 'webvimark\modules\UserManagement\components\UserConfig',
                'class' => 'backend\components\UserConfig',    
		// Comment this if you don't want to record user logins
		'on afterLogin' => function($event) {
				\webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
			}
	],  
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy']        
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'messageCategory' => 'frontend'
            ]
        ]
    ];
}

return $config;
