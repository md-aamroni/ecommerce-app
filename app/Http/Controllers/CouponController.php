<?php

namespace App\Http\Controllers;

use App\Models\CouponModel;

class CouponController extends CouponModel
{
	public function allCoupons($order = false)
	{
		return $this->all($this->table, $order);
	}

	public function create($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired)
	{
		return $this->addNewCoupon($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired);
	}

	public function status($status, $id)
	{
		return $this->changeStatus($this->table, 'status', $status, $id);
	}

	public function update($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired, $id)
	{
		return $this->updateCoupon($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired, $id);
	}
}
