<?php

namespace App\Models;

use App\Eloquent\EloquentORM;

class UserModel extends EloquentORM
{
	protected function allUsers($orderBy = null)
	{
		return $this->all('users');
	}

	// protected function deleteUser()
	// {
	// 	$this->table = 'soe';
	// 	$this->id = 1;

	// 	$this->drop($this->table, $this->id);
	// }
}
