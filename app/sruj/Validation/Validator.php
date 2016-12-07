<?php 
namespace sruj\Validation;
use sruj\User\User;
use Violin\Violin;
class Validator extends Violin
{
	protected  $user ;
	function __construct(User $user)
		{
			$this->user = $user;
			$this->addFieldMessages(
						[
							'email'=>[
									'uniqueEmail'=>'This Email Id is already exists'
									]
								]
					);
		}	
	public function validate_uniqueEmail($value,$input,$args)
	{
		$user = $this->user->where('email',$value);
		return ! (bool) $user->count();
	}
}