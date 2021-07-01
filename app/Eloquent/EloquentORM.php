<?php

namespace App\Eloquent;

use PDO;
use Exception;
use App\Http\Core\Controller;

class EloquentORM extends Controller
{
	// Read Query
	protected function all($table, $order = false)
	{
		if (is_bool($order) && $order === true) {
			$sqlCode = "SELECT * FROM $table ORDER BY `id` DESC";
		} else {
			$sqlCode = "SELECT * FROM $table ORDER BY `id` ASC";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRow = $queries->rowCount();

		if ($totalRow > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findOn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} = {$val1}";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findLike($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null, $col4 = null, $val4 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} LIKE '%{$val1}%'";

		if (!is_null($col2) && !is_null($col3) && !is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%' AND {$col3} LIKE '%{$val3}%' AND {$col4} LIKE '%{$val4}%'";
		} elseif (!is_null($col2) && !is_null($col3) && is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%' AND {$col3} LIKE '%{$val3}%'";
		} elseif (!is_null($col2) && is_null($col3) && is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%'";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findIn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} IN ({$val1})";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findNotIn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} != ({$val1})";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findOnDate($table, $date, $type, $range, $col1 = null, $val1 = null, $col2 = null, $val2 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE";

		// 0 => Equal
		// 1 => Not Equal
		// 2 => Less Than
		// 3 => Less Than or Equal
		// 4 => Greater Than
		// 5 => Greater Than or Equal
		if (is_int($type) && $type == 0) {
			$sqlCode .= " {$date} = {$range}";
		} elseif (is_int($type) && $type == 1) {
			$sqlCode .= " {$date} != {$range}";
		} elseif (is_int($type) && $type == 2) {
			$sqlCode .= " {$date} < {$range}";
		} elseif (is_int($type) && $type == 3) {
			$sqlCode .= " {$date} <= {$range}";
		} elseif (is_int($type) && $type == 4) {
			$sqlCode .= " {$date} > {$range}";
		} elseif (is_int($type) && $type == 5) {
			$sqlCode .= " {$date} >= {$range}";
		}

		if (!is_null($col1) && !is_null($col2)) {
			$sqlCode .= " AND {$col1} = {$val1} AND {$col2} = {$val2}";
		} elseif (!is_null($col1) && is_null($col2)) {
			$sqlCode .= " AND {$col1} = {$val1}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findBetween($table, $col1, $val1, $col2 = null, $val2 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} BETWEEN {$val1}";
		if (!is_null($col2)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function findColumns($table, $columns, $col1, $val1, $col2 = null, $val2 = null)
	{
		if (is_array($columns)) {
			$cols = implode(', ', $columns);
		} else {
			$cols = $columns;
		}

		$sqlCode = "SELECT {$cols} FROM {$table} WHERE {$col1} = {$val1}";
		if (!is_null($col2)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function uniqueOn($table, $column)
	{
		$sqlCode = "SELECT DISTINCT {$column} FROM {$table}";
		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function sumTotalOn($table, $sum, $col1 = null, $val1 = null, $col2 = null, $val2 = null)
	{
		$sqlCode = "SELECT SUM(`{$sum}`) AS 'total' FROM {$table}";

		if (!is_null($col1)) {
			$sqlCode .= " WHERE `{$col1}` = {$val1}";
		} elseif (!is_null($col1) && !is_null($col2)) {
			$sqlCode .= " WHERE `{$col1}` = {$val1} AND `{$col2}` = {$val2}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function eachMonthTotal($table, $calculate, $col1, $val1, $col2 = null, $val2 = null, $date = null, $range = null)
	{
		// SELECT sum(amount_total) AS 'total' FROM `account_statements` WHERE `account_type` = "Expenses" AND `date` BETWEEN "2021-03-01" AND "2021-03-31"
		$sqlCode = "SELECT SUM({$calculate}) AS 'total' FROM {$table} WHERE `{$col1}` = {$val1}";
		if (!is_null($col2) && !is_null($date)) {
			$sqlCode .= " AND `{$col2}` = {$val2} AND `{$date}` BETWEEN {$range}";
		} elseif (is_null($col2) && !is_null($date)) {
			$sqlCode .= " AND `{$date}` BETWEEN {$range}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function countTotal($table, $countOn, $type = null, $col1 = null, $val1 = null, $col2 = null, $val2 = null, $date = null, $range = null, $isEqual = true)
	{
		if (!is_null($type) && $type == "unique") {
			$sqlCode = "SELECT COUNT(DISTINCT `{$countOn}`) AS 'total' FROM {$table}";
		} else {
			$sqlCode = "SELECT COUNT(`{$countOn}`) AS 'total' FROM {$table}";
		}

		if (!is_null($col1) && is_null($col2) && is_null($date) && is_bool($isEqual) === true) {
			$sqlCode .= " WHERE `{$col1}` = {$val1}";
		} elseif (!is_null($col1) && !is_null($col2) && is_null($date) && is_bool($isEqual) === true) {
			$sqlCode .= " WHERE `{$col1}` = {$val1} AND `{$col2}` = {$val2}";
		} elseif (!is_null($col1) && !is_null($col2) && !is_null($date) && is_bool($isEqual) === true) {
			$sqlCode .= " WHERE `{$col1}` = {$val1} AND `{$col2}` = {$val2} AND `{$date}` BETWEEN {$range}";
		} elseif (!is_null($col1) && !is_null($date) && is_bool($isEqual) === false) {
			$sqlCode .= " WHERE `{$col1}` != {$val1} AND `{$date}` BETWEEN {$range}";
		}

		$queries = $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	protected function columnArray($table, $column)
	{
		$sqlCode	= "SELECT {$column} FROM {$table}";
		$queries	= $this->connection->prepare($sqlCode);
		$queries->execute();
		$dataList = $queries->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $queries->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}


	// Delete Query
	protected function drop($table, $delete_id)
	{
		$sqlCode = "DELETE FROM $table WHERE id = :DELETE_ID";
		$queries	= $this->connection->prepare($sqlCode);
		$values  = array(':DELETE_ID' => $delete_id);

		try {
			if ($queries->execute($values)) {
				$deletedRowNumber = $queries->rowCount();
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
		$queries = $this->connection->prepare($sqlCode);
		$values  = array(':DELETE_ID' => $delete_ids);

		try {
			if ($queries->execute($values)) {
				$deletedRowNumber = $queries->rowCount();
				return $deletedRowNumber;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}


	// Update Query
	protected function changeStatus($table, $column, $status, $id)
	{
		$this->table	= $this->encode($table);
		$this->column	= $this->encode($column);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		if ($this->status == "Active") {
			$sqlCode = "UPDATE $this->table SET $this->column = 'Inactive', updated_at = :UPDATED_AT WHERE id	= :UPDATE_ID";
		} else if ($this->status == "Inactive") {
			$sqlCode = "UPDATE $this->table SET $this->column = 'Active', updated_at = :UPDATED_AT WHERE id	= :UPDATE_ID";
		}

		$query	= $this->connection->prepare($sqlCode);
		$values	= array(':UPDATED_AT' => date("Y-m-d H:i:s"), ':UPDATE_ID' => $this->id);
		try {
			if ($query->execute($values)) {
				$totalRowUpdated = $query->rowCount();
				return $totalRowUpdated;
			} else {
				throw new Exception();
			}
		} catch (Exception $e) {
			return false;
		}
	}
}
