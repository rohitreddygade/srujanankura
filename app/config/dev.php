<?php 
return[
'app' => [
			'url'  => 'http://localhost',
			'hash' =>[ 
					'algo' => PASSWORD_BCRYPT,
					'cost'=> '10'
			]
		],
		'db' => [
				'driver' => 'mysql',
				'host'  =>'127.0.0.1',
				'name'  =>'sruj',
				'username'=>'root',
				'password' =>'',
				'charset' => 'utf8',
				'collection' => 'utf_unicode_ci',
				'prefix' => ''
		],
		'auth' =>[
			'session' =>'user_id',
			'remember'=>'user_r'
		],
		'mail' =>[
			'smtp_auth' => true,
			'smtp_secure' =>"tls",
			'host' => 'smtp.mailchimp.com',
			'username'=>'gade.rohitreddy@gmail.com',
			'password' =>'Rohit_1996',
			'port' => 587,
			'html' => true
		],
		'twig' => [
					'debug' => true
				],
		'csrf' => 'csrf_token'
];