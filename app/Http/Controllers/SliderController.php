<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;


class SliderController extends SliderModel
{
	public function allSlider($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($title,$sub_title, $images, $alt_text, $is_activ)
	{
		return $this->addNewSlider($title,$sub_title, $images, $alt_text, $is_activ);
	}

	public function status($status, $id )
	{
		return $this->changeStatus($this->table, 'is_active', $status, $id );
	}

	public function update($title, $sub_title, $images, $alt_text, $is_active, $id)
	{
		return $this->updateSlider($title, $sub_title, $images, $alt_text, $is_active, $id);
	}
}
