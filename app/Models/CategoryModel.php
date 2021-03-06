<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class CategoryModel extends EloquentORM
{
	protected $table = 'categories';
	protected $id;
	protected $title;
	protected $slug;
	protected $isFeat;
	protected $status;

	protected function addNewCategory($title, $isFeat, $status)
	{
		$this->title	= $this->encode($title);
		$this->slug		= makeSlug($this->encode($title));
		$this->isFeat	= !empty($this->encode($isFeat)) ? $this->encode($isFeat) : 'No';
		$this->status	= !empty($this->encode($status)) ? $this->encode($status) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (
							`title`, `slug`, `is_featured`, `status`, `created_at`
						)
						VALUES (
							:C_TITLE, :C_SLUG, :C_IS_FEAT, :C_STATUS, :CREATED_AT
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':C_TITLE'		=> $this->title,
			':C_SLUG'		=> $this->slug,
			':C_IS_FEAT'	=> $this->isFeat,
			':C_STATUS'		=> $this->status,
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


	protected function updateCategory($title, $isFeat, $status, $id)
	{
		$this->title	= $this->encode($title);
		$this->slug		= makeSlug($this->encode($title));
		$this->isFeat	= $this->encode($isFeat);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		$sqlCode = "UPDATE $this->table
                  SET
							`title` = :C_TITLE, `slug` = :C_SLUG, `is_featured` = :C_IS_FEATURED, `status` = :C_STATUS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
			':C_TITLE'        => $this->title,
			':C_SLUG'         => $this->slug,
			':C_IS_FEATURED'  => $this->isFeat,
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
