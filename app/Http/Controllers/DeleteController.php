<?php

namespace App\Http\Controllers;

use App\Eloquent\EloquentORM;

class DeleteController extends EloquentORM
{
	public function single($table, $id)
	{
		return $this->dropSingle($table, $id);
	}

	public function multiple($table, $id)
	{
		return $this->dropMultiple($table, $id);
	}
}
