<?php 
$app->get('/login',function() use($app){
	$app->render('auth/register.php');
})->name('login');
$app->post('/login',function() use($app){
	$request = $app->request;
	$idnt = $request->post('email');
	$password = $request->post('password');
	$v = $app->validation;
	$v->validate([
			'email' => [$idnt,'required'],
			'password' => [$password,'required|min(6)|max(30)']
			]);
	if ($v->passes()) {
		$user = $app->user->where('email',$idnt)
							->orwhere('sru_id',$idnt)
							->where('active',true)
							->first();
		if ($user && $app->hash->passwordCheck($password,$user->password)) {
			$_SESSION[$app->config->get('auth.session')] = $user->id;
						$app->flash('global','You have logied in to the system..');

		}
		else
		{
			$app->flash('global','Activate your E-Mail || Email || SRU ID || Password Incorrect..!');
		}
			$app->response->redirect($app->urlFor('home'));
	}
	$app->render('auth/register.php',[
		'errors' => $v->errors(),
		'req'=> $request
		]);
})->name('login.post');