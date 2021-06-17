<?php

namespace App\Eloquent;

use Exception;
use App\Http\Core\Controller;

class Eloquent extends Controller
{
	protected function all()
	{
		// Code Here..
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
