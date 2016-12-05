<?php 
use Illuminate\Database\Capsule\Manager as Capusle;
$capusle = new Capusle;
$capusle->addConnection(
		[
				'driver' => $app->config->get('db.driver'),
				'host'   => $app->config->get('db.host'),
				'database'=> $app-> config->get('db.name'),
				'username'=> $app->config->get('db.username'),
				'password'=> $app->config->get('db.password'),
				'charset'=> $app->config->get('db.charset'),
				'collation'=> $app->config->get('db.collection'),
				'prefix' => $app->config->get('db.prefix')]
);
		$capusle->bootEloquent( );