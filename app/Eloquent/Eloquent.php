<?php

namespace App\Http\Eloquent;

use Exception;
use App\Http\Core\Controller;

class Eloquent extends Controller
{
	public function all()
	{
		// Code Here..
	}


	public function findOn()
	{
		// Code Here..
	}


	public function findLike()
	{
		// Code Here..
	}


	public function drop($table, $delete_id)
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


	public function dropMultiple($table, $delete_ids)
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
