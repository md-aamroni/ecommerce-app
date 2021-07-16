<?php
<<<<<<< HEAD
namespace App\Http\Controllers;
use App\Models\SliderModel;

=======

namespace App\Http\Controllers;

use App\Models\SliderModel;


>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
class SliderController extends SliderModel
{
	public function allSlider($order = false)
	{
		return $this->all($this->table, $order);
	}

<<<<<<< HEAD
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
=======
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
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
	}
}
