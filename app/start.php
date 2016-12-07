<?php
use \Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use sruj\User\User;
use sruj\Validation\Validator;
use sruj\Helpers\Hash;
use sruj\Helpers\Sruid;
use sruj\Middleware\BeforeMiddleware;
use sruj\Mail\Mailer;
use Mailgun\Mailgun;
use RandomLin\Factory as RandomLin; 

session_cache_limiter(false);
session_start();
// remove this in production.
ini_set("display_errors",'On');
define('INC_ROOT', dirname(__DIR__));
require INC_ROOT.'/vendor/autoload.php';
$app = new Slim([
		'mode' => file_get_contents(INC_ROOT.'/mode.php'),
		'view' => new Twig(),
		'templates.path' => INC_ROOT.'/app/views'
		
	]);
$app->add(new BeforeMiddleware);
$app->configureMOde($app->config('mode'),function() use ($app)
			{
				$app->config  = Config::load(INC_ROOT ."/app/config/{$app->mode}.php");
			});
require 'database.php';
require 'routes.php'; 
$app->auth = false;
$app->container->set('user',function(){
	return new User;
});
$app->container->singleton('sruid',function() use($app){
	return new Sruid($app->user);
});
$app->container->singleton('hash',function() use($app){
	return new Hash($app->config);
});
$app->container->singleton('validation',function() use ($app){
	return new Validator($app->user);
});
$app->container->singleton('randomlib',function() use ($app){
		$factory = new RandomLib;
		return $factory->getMediumStrenghtGenerator();
});
$app->container->singleton('mail',function() use ($app){
	return new SendGrid();

});
$view = $app->view();
$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];
$view->parserExtensions = [ new TwigExtension ];