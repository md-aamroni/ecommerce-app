<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;

class AdminController extends AdminModel
{
	public function index()
	{
		return $this->allAdmins(false);
	}
}
