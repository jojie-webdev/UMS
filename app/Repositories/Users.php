<?php

namespace App\Repositories;
use App\User;

class Users
{
	public function all() 
	{
		//return all users
		return User::all();
	}
}