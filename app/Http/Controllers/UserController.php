<?php

namespace App\Http\Controllers;

use App\Models\UserModel;

class UserController extends UserModel
{
	public function index()
	{
		return $this->allUsers(true);
	}
}
