<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;

class SeoController extends SeoModel
{
	public function allSeoList($order = false)
	{
		return $this->all($this->table, $order);
	}


	public function create($page_url, $priority, $status, $keywords, $description)
	{
		return $this->addNewPage($page_url, $priority, $status, $keywords, $description);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}

	public function update($page_url, $priority, $status, $keywords, $description, $id)
	{
		return $this->updateSeoPage($page_url, $priority, $status, $keywords, $description, $id);
	}
}
