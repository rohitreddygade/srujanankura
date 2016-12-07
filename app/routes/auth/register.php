<?php 
$app->get('/user',function() use($app){
	$app->render('auth/register.php');
})->name('register');
$app->post('/register',function() use($app){
	$request = $app->request;
	$email =   $request->post('email');
	$password = $request->post('password');
	$password_again = $request->post('password_again');
	$fn = $request->post('first_name');
	$ln = $request->post('last_name');
	$cln = $request->post('college_name');
	$clid = $request->post('college_id');
	$v = $app->validation;
	$v->validate([
			'email' => [$email,'required|email|uniqueEmail'],
			'first_name' => [$fn,'required|max(30)'],
			'last_name' => [$ln,'required|max(30)'],
			'college_name' => [$cln,'required|max(50)'],
			'college_id' => [$clid,'required|max(30)'],
			'password' => [$password,'required|min(6)|max(30)'],
			'password_again' => [$password_again,'required|matches(password)']
		]);
	if ($v->passes()) {
		$token = 
		$user = $app->user->create([
 							'first_name' => $fn,
 							'last_name' => $ln,
 							'email' => $email,
 							'college_name' =>$cln,
 							'college_id' => $clid,
 							'password' => $app->hash->password($password),
 							'active' => false,
 							'active_hash' => $token;
			]);
		$id = $app->sruid->gen_sru_id($email);
		$app->user->where('email',$email)->update(['sru_id'=> $id]);
		$app->mail->send('email/auth/registered.php',['user'=>$user],function($message)use ($user){
			$message->to($user->email);
			$message->subject('Srujanankura | Conform your Email');
		});
		$app->flash('global','You Have successfully registed  Please activate your email');
		$app->response->redirect($app->urlFor('home'));
	}
	$app->render('auth/register.php',[
		'errors' => $v->errors(),
		'request'=> $request
		]);

})->name('register.post');