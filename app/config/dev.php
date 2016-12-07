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
				'collection' => 'utf8_unicode_ci',
				'prefix' => ''
		],
		'auth' =>[
			'session' =>'user_id',
			'remember'=>'user_r'
		],
		'mail' =>[
			'secret' => 'key-eacb0b518f366138407ad40b16f40ac3',
			'domain' => 'sandbox5d1b7759b01147418d1db74a88a2c79b',
			'from'   => 'noreplay@localhost'
		],
		'twig' => [
					'debug' => true
				],
		'csrf' => 'csrf_token'
];