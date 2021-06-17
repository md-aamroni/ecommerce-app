<?php

namespace App\Models;

use App\Eloquent\Eloquent;

class UserModel extends Eloquent
{
	protected function index()
	{

	}

	protected function deleteUser()
	{
		$this->table = 'soe';
		$this->id = 1;

		$this->drop($this->table, $this->id);
	}
}
