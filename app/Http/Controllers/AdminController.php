<?php
namespace App\Http\Controllers;
use App\Models\AdminModel;

class AdminController extends AdminModel
{
	public function allAdminController($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($fullName,$user_name, $email, $password,$roles,$banner,$status)
	{
		return $this->addNewAdmin($fullName,$user_name, $email, $password,$roles,$banner,$status);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}

	public function update($full_name, $email, $password,$roles,$banner,$status, $id)
	{
		return $this->updateAdmin($full_name, $email, $password,$roles,$banner,$status, $id);
	}
}

