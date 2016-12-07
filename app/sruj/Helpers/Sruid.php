<?php 
namespace sruj\Helpers;

use sruj\User\User;

class Sruid
{
	protected $user;
	function __construct(User $user)
	{
		$this->user = $user;
	}
	public function gen_sru_id($email)
	{
		$use = $this->user->select('id')->where('email','=',$email)->first();
		$c=0;
		$val = intval($use->id);
		while($val!= 0)
			{
				$c  = $c+1;
				$val= intval($val/10);
			}
		if ($c == 1) {
			$st ='00';
		}elseif ($c == 2) {
			$st ='0';
		}
		else{
			$st='';
		}
		$num = 'sru-'.$st.$use->id;
		return $num;
	}
	
		

}