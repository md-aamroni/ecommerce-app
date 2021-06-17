<?php

namespace App\Eloquent;

use PDO;
use Exception;
use App\Http\Core\Controller;

class EloquentORM extends Controller
{
	protected $sqlCode;
	protected $query;
	protected $table;
	protected $order;
	protected $dataList;
	protected $totalRow;

	protected function all($table, $order = null)
	{
		$this->table = $table;
		$this->order = $order;

		if (!is_null($this->order) && $this->order === true) {
			$this->sqlCode = "SELECT * FROM $this->table ORDER BY `id` DESC";
		} else {
			$this->sqlCode = "SELECT * FROM $this->table ORDER BY `id` ASC";
		}

		$this->query = $this->connection->prepare($this->sqlCode);
		$this->query->execute();
		$this->dataList = $this->query->fetchAll(PDO::FETCH_ASSOC);
		$this->totalRow = $this->query->rowCount();

		if ($this->totalRow > 0) {
			return $this->dataList;
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
		$this->sqlCode = "DELETE FROM $table WHERE id = :DELETE_ID";
		$query   = $this->connection->prepare($this->sqlCode);
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
		$this->sqlCode = "DELETE FROM $table WHERE `id` IN (:DELETE_ID)";
		$query   = $this->connection->prepare($this->sqlCode);
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
