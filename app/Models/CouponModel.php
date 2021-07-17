<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class CouponModel extends EloquentORM
{
	protected $table = 'coupons';
	protected $id;
	protected $code;
	protected $price;
	protected $percentage;
	protected $max_total_amount;
	protected $start_date;
	protected $end_date;
    protected $is_premium_user;
	protected $user_limit;
	protected $total_usage;
    protected $is_expired;

	protected function addNewCoupon($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired)
	{
		$this->code	= $this->encode($code);
		$this->price	= $this->encode($price);
		$this->percentage	= $this->encode($percentage);
        $this->max_total_amount	= $this->encode($max_total_amount);
		$this->start_date	= $this->encode($start_date);
		$this->end_date	= $this->encode($end_date);
        $this->is_premium_user	= $this->encode($is_premium_user);
		$this->user_limit	= $this->encode($user_limit);
		$this->total_usage	= $this->encode($total_usage);
		$this->is_expired	= $this->encode($is_expired);

		$sqlCode	= "INSERT INTO $this->table (
							`id`, `code`, `price`, `percentage`, `max_total_amount`, `start_date`, `end_date`, `is_premium_user`, `user_limit`, `total_usage`,`is_expired`, `created_at`
						)
						VALUES (
							:id, :code, :price, :c_percentage, :max_total_amount,:c_start_date, :end_date, :is_premium_user, :user_limit, :total_usage, :is_expired, :CREATED_AT
						)";


		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':id'		=> $this->id,
			':code'		=> $this->code,
			':price'		=> $this->price,
			':c_percentage'	=> $this->percentage,
			':max_total_amount'		=> $this->max_total_amount,
            ':c_start_date'		=> $this->start_date,
			':end_date'		=> $this->end_date,
			':is_premium_user'		=> $this->is_premium_user,
			':user_limit'	=> $this->user_limit,
			':total_usage'		=> $this->total_usage,
			':is_expired'		=> $this->is_expired,
			':CREATED_AT'	=> date("Y-m-d H:i:s")
		);

		$queries->execute($bindParam);
		$isError = $queries->errorInfo();

		try {
			if (is_array($isError) && !empty($isError[1])) {
				$datalist = [
					'code' => $queries->errorCode(),
					'type' => $isError[1],
					'info' => $isError[2],
				];
				throw new Exception($datalist);
			} else {
				$totalRowCount	= $queries->rowCount();
				$lastInsertId	= $this->connection->lastInsertId();

				return array(
					'totalRowInsert'	=> $totalRowCount,
					'lastInsertID'		=> $lastInsertId,
				);
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	protected function updateCoupon($code, $price, $percentage, $max_total_amount,$start_date, $end_date, $is_premium_user, $user_limit,$total_usage, $is_expired, $id)
	{
		$this->code	= $this->encode($code);
		$this->price	= $this->encode($price);
		$this->percentage	= $this->encode($percentage);
        $this->max_total_amount	= $this->encode($max_total_amount);
		$this->start_date	= $this->encode($start_date);
		$this->end_date	= $this->encode($end_date);
        $this->is_premium_user	= $this->encode($is_premium_user);
		$this->user_limit	= $this->encode($user_limit);
		$this->total_usage	= $this->encode($total_usage);
		$this->is_expired	= !empty($this->encode($is_expired)) ? $this->encode($is_expired) : 'Active';
		$this->id		= $this->encode($id);

		$sqlCode = "UPDATE $this->table
                  SET
							`id` = :id, `code` = :code, `price` = :price, `percentage` = :c_percentage, 
                            `max_total_amount` = :max_total_amount, `start_date` = :c_start_date, `end_date` = :end_date, `is_premium_user` = :is_premium_user,`user_limit` = :user_limit, `total_usage` = :total_usage, 
                            `is_expired` = :S_STATUS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
			':id'		=> $this->id,
			':code'		=> $this->code,
			':price'		=> $this->price,
			':c_percentage'		=> $this->cpercentage,
			':max_total_amount'		=> $this->max_total_amount,
            ':c_start_date'		=> $this->start_date,
            ':end_date'		=> $this->end_date,
			':is_premium_user'		=> $this->is_premium_user,
			':user_limit'		=> $this->user_limit,
			':total_usage'		=> $this->total_usage,
			':S_STATUS'		=> $this->is_expired,
			':UPDATED_AT'	=> date("Y-m-d H:i:s"),
			':UPDATE_ID'	=> $this->id
		);

		$queries->execute($values);
		$isError = $queries->errorInfo();

		try {
			if (is_array($isError) && !empty($isError[1])) {
				$datalist = [
					'code' => $queries->errorCode(),
					'type' => $isError[1],
					'info' => $isError[2],
				];
				throw new Exception($datalist);
			} else {
				return $queries->rowCount();
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
