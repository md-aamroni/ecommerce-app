<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;

class SubCategoryController extends SubCategoryModel
{
	public function allSubCategories($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($category, $title, $banner, $status)
	{
		return $this->addNewSubCategory($category, $title, $banner, $status);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}

	public function update($category, $title, $banner, $status, $id)
	{
		return $this->updateSubCategory($category, $title, $banner, $status, $id);
	}
}
