<?php

namespace App\Eloquent;

use PDO;
use Exception;
use App\Http\Core\Controller;

class EloquentORM extends Controller
{
	public $sqlCode;

	protected function all($tableName, $orderBy = null)
	{
		if (!is_null($orderBy) && $orderBy === true) {
			$this->sqlCode = "SELECT * FROM {$tableName} ORDER BY `id` DESC";
		} else {
			$this->sqlCode = "SELECT * FROM {$tableName} ORDER BY `id` ASC";
		}

		$query = $this->connection->prepare($this->sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findOn()
	{
		// Code Here..
	}


	protected function findLike()
	{
		// Code Here..
	}


	protected function drop($table, $delete_id)
	{
		$sqlCode = "DELETE FROM $table WHERE id = :DELETE_ID";
		$query   = $this->connection->prepare($sqlCode);
		$values  = array(':DELETE_ID' => $delete_id);

		try {
			if ($query->execute($values)) {
				$deletedRowNumber = $query->rowCount();
				return $deletedRowNumber;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}


	protected function dropMultiple($table, $delete_ids)
	{
		$sqlCode = "DELETE FROM $table WHERE `id` IN (:DELETE_ID)";
		$query   = $this->connection->prepare($sqlCode);
		$values  = array(':DELETE_ID' => $delete_ids);

		try {
			if ($query->execute($values)) {
				$deletedRowNumber = $query->rowCount();
				return $deletedRowNumber;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}
}
