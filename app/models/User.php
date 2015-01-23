<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * User Roles
	 * @return mixed
	 */
	public function roles()
	{
		return $this->hasMany('verilion\vcms\UserRole');
	}


	/**
	 * User Prefs
	 *
	 * @return mixed
	 */
	public function prefs()
	{
		return $this->hasOne('verilion\vcms\UserPref');
	}


	/**
	 * Check if User has role
	 *
	 * @param $role_id
	 * @return bool
	 */
	public function hasRole($role_id)
	{
		return in_array($role_id, DB::table(Config::get('vcms::user_roles_table'))
			->where('user_id', $this->id)
			->lists('role'));
	}

}
