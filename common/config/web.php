<?php
$config = [
    'components' => [
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => env('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV
        ],
      //   'response' => [
      //     'class' => 'yii\web\Response',
      //     'on beforeSend' => function ($event) {
      //         $response = $event->sender;
      //         // Set CORS headers
      //         $response->headers->set('Access-Control-Allow-Origin', '*');
      //         $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
      //         $response->headers->set('Access-Control-Allow-Headers', 'Authorization');
      //     },
      // ],
        'formatter' => [
            'class' => '\common\components\CustomFormatter',
            // other settings for formatter
    //        'dateFormat' => 'yyyy-MM-dd',
        ], 
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => 'No-reply@mihe.ac.uk',	   
				'password' => 'emdavlfkjzfbvdwz',
				'port' => '465',
				'encryption' => 'ssl',
				],
		],   
		'mailer_student_portal' => [
			'class' => 'yii\swiftmailer\Mailer',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.gmail.com',
				'username' => 'Student-portal@mihe.ac.uk',	   
				'password' => 'ndushruamgwknmud',
				'port' => '465',
				'encryption' => 'ssl',
				],
		],   	
	],
    'as locale' => [
        'class' => common\behaviors\LocaleBehavior::class,
        'enablePreferredLanguage' => true
    ],
    'container' => [
        'definitions' => [
           \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
        ],
    ],
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['*'],
    ];
}

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'allowedIPs' => ['*'],
    ];
}


return $config;
