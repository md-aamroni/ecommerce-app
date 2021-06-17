<?php

namespace App\Models;

use App\Eloquent\EloquentORM;

class AdminModal extends EloquentORM
{
	protected $table;
	protected $order;

	protected function allAdmins()
	{
		$this->table = 'users';
		$this->order = false;
		return $this->all($this->table, $this->order);
	}
}
