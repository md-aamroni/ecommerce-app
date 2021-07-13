<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;

class CategoryController extends CategoryModel
{
	public function allCategories($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($title, $isFeat, $status)
	{
		return $this->addNewCategory($title, $isFeat, $status);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}
	
	
}
