<?php 
namespace sruj\User;
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * User Mode that handles the users 
 */
 class User extends Eloquent
 {
 	protected $table = 'users';
 	protected $fillable = [
 							'sru_id',
 							'first_name',
 							'last_name',
 							'email',
 							'college_name',
 							'college_id',
 							'username',
 							'password',
 							'active',
 							'active_hash',
 							'remember_identifier',
 							'remember_token'
 	]; 
 	public function getsruid()
 	{
 		if (!$this->sru_id) {
 			return false;
 		}
 		return $this->sru_id;
 	}
 } ?>