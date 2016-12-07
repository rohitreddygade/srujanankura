<?php 
namespace sruj\Middleware;
use Slim\Middleware;

class BeforeMIddleware extends Middleware
{
	public function call()
	{
		$this->app->hook('slim.before',[$this,'run']);
		$this->next->call();
	}
	public function run()
	{		
		if (isset($_SESSION[$this->app->config->get('auth.session')])) {
			$this->app->container->auth = $this->app->user->where('id',$_SESSION[$this->app->config->get('auth.session')])->first();
		}
		$this->app->view()->appendData([
			'auth'=> $this->app->container->auth]);
	}
}