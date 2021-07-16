<?php

namespace App\Models;
use Exception;
use App\Eloquent\EloquentORM;

class AdminModel extends EloquentORM
{
	protected $table = 'admins';
	protected $id;
	protected $full_name;
	protected $email;
	protected $password;
	protected $roles;
	protected $user_name;
	protected $banner;
	protected $status;

	protected function addNewAdmin($full_name,$user_name, $email, $password,$roles,$banner,$status)
	{
		$this->full_name	= $this->encode($full_name);
		$this->user_name	= $this->encode($user_name);
		$this->email	= $this->encode($email);
		$this->password	= $this->encode($password);
		$this->roles	= $this->encode($roles);
		$this->banner	= $this->encode($banner);
		$this->status	= !empty($this->encode($status)) ? $this->encode($status) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (`id`, `full_name`, `user_name`, `email`, `password`,`roles`,`banner`,`status`, `created_at`
						)
						VALUES (:a_id, :a_full_name, :a_user_name, :a_email, :a_password, :a_roles, :a_banner, :a_status, :CREATED_AT
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':a_id'				=> $this->id,
			':a_full_name'		=> $this->full_name,
			':a_user_name'		=> $this->user_name,
			':a_email'			=> $this->email,
			':a_password'		=> $this->password,
			':a_roles'			=> $this->roles,
			':a_banner'			=> $this->banner,
			':a_status'			=> $this->status,
			':CREATED_AT'		=> date("Y-m-d H:i:s")
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


	protected function updateAdmin($full_name, $email, $password,$roles,$banner,$status, $id)
	{
		$this->full_name	= $this->encode($full_name);
		$this->user_name		= makeSlug($this->encode($full_name));
		$this->email	= $this->encode($email);
		$this->password	= $this->encode($password);
		$this->roles	= $this->encode($roles);
		$this->banner	= $this->encode($banner);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		$sqlCode = "UPDATE $this->table
                  SET
							`full_name` = :full_name, `email` = :email,`password` = :a_password,`roles` = :a_roles,`banner` = :banner,`status` = :C_STATUS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
			':full_name'        => $this->full_name,
			':email'  => $this->email,
			':a_password'  => $this->password,
			':a_roles'  => $this->roles,
			':banner'  => $this->banner,
			':C_STATUS'       => $this->status,
			':UPDATED_AT'     => date("Y-m-d H:i:s"),
			':UPDATE_ID'      => $this->id
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
