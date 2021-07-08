<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class CategoryModel extends EloquentORM
{
	protected $table = 'categories';
	protected $id;
	protected $title;
	protected $isFeat;
	protected $status;

	protected function addNewCategory($title, $isFeat, $status)
	{
		$this->title	= $this->encode($title);
		$this->isFeat	= !empty($this->encode($isFeat)) ? $this->encode($isFeat) : 'No';
		$this->status	= !empty($this->encode($status)) ? $this->encode($status) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (
							`title`, `is_featured`, `status`, `created_at`
						)
						VALUES (
							:C_TITLE, :C_IS_FEAT, :C_STATUS, :CREATED_AT
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':C_TITLE'		=> $this->title,
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
}
