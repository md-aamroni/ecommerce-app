<?php
namespace App\Http\Controllers;
use App\Models\SliderModel;

class SliderController extends SliderModel
{
	public function allSlider($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($title,$sub_title, $banner, $status)
	{
		return $this->addNewSlider($title,$sub_title, $banner, $status);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}

	public function update($title,$sub_title, $banner, $status, $id)
	{
		return $this->updateSlider($title,$sub_title, $banner, $status, $id);
	}
}
