<?php

namespace App\Models;

use App\Eloquent\EloquentORM;

class UserModel extends EloquentORM
{
	protected function allUsers($order = false)
	{
		$this->table = 'countries';
		$this->order = $order;
		return $this->all($this->table, $this->order);
	}
}
