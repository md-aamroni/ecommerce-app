<?php

namespace App\Models;

use App\Eloquent\EloquentORM;

class AdminModal extends EloquentORM
{
	protected function allAdmins($order = false)
	{
		$this->table = 'countries';
		$this->order = $order;
		return $this->all($this->table, $this->order);
	}
}
