<?php

namespace App\Http\Controllers;

use App\Models\AdminModal;

class AdminController extends AdminModal
{
	public function index()
	{
		return $this->allAdmins();
	}
}
