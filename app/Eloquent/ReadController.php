<?php

class ReadController extends Controller
{
	public function all($table, $orderBy = null)
	{
		$sqlCode = "SELECT * FROM {$table}";
		if (!is_null($orderBy) && $orderBy === true) {
			$sqlCode .= " ORDER BY `id` DESC";
		} else {
			$sqlCode .= " ORDER BY `id` ASC";
		}
		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findLike($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null, $col4 = null, $val4 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} LIKE '%{$val1}%'";

		if (!is_null($col2) && !is_null($col3) && !is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%' AND {$col3} LIKE '%{$val3}%' AND {$col4} LIKE '%{$val4}%'";
		} elseif (!is_null($col2) && !is_null($col3) && is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%' AND {$col3} LIKE '%{$val3}%'";
		} elseif (!is_null($col2) && is_null($col3) && is_null($col4)) {
			$sqlCode .= " AND {$col2} LIKE '%{$val2}%'";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findOn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} = {$val1}";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findIn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} IN ({$val1})";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findNotIn($table, $col1, $val1, $col2 = null, $val2 = null, $col3 = null, $val3 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} != ({$val1})";

		if (!is_null($col2) && !is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}  AND {$col2} = {$val2}";
		} elseif (!is_null($col2) && is_null($col3)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findOnDate($table, $date, $type, $range, $col1 = null, $val1 = null, $col2 = null, $val2 = null)
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

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findBetween($table, $col1, $val1, $col2 = null, $val2 = null)
	{
		$sqlCode = "SELECT * FROM {$table} WHERE {$col1} BETWEEN {$val1}";
		if (!is_null($col2)) {
			$sqlCode .= " AND {$col2} = {$val2}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function findColumns($table, $columns, $col1, $val1, $col2 = null, $val2 = null)
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

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function uniqueOn($table, $column)
	{
		$sqlCode = "SELECT DISTINCT {$column} FROM {$table}";
		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function sumTotalOn($table, $sum, $col1 = null, $val1 = null, $col2 = null, $val2 = null)
	{
		$sqlCode = "SELECT SUM(`{$sum}`) AS 'total' FROM {$table}";

		if (!is_null($col1)) {
			$sqlCode .= " WHERE `{$col1}` = {$val1}";
		} elseif (!is_null($col1) && !is_null($col2)) {
			$sqlCode .= " WHERE `{$col1}` = {$val1} AND `{$col2}` = {$val2}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function eachMonthTotal($table, $calculate, $col1, $val1, $col2 = null, $val2 = null, $date = null, $range = null)
	{
		// SELECT sum(amount_total) AS 'total' FROM `account_statements` WHERE `account_type` = "Expenses" AND `date` BETWEEN "2021-03-01" AND "2021-03-31"
		$sqlCode = "SELECT SUM({$calculate}) AS 'total' FROM {$table} WHERE `{$col1}` = {$val1}";
		if (!is_null($col2) && !is_null($date)) {
			$sqlCode .= " AND `{$col2}` = {$val2} AND `{$date}` BETWEEN {$range}";
		} elseif (is_null($col2) && !is_null($date)) {
			$sqlCode .= " AND `{$date}` BETWEEN {$range}";
		}

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function countTotal($table, $countOn, $type = null, $col1 = null, $val1 = null, $col2 = null, $val2 = null, $date = null, $range = null, $isEqual = true)
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

		$query = $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}

	public function columnArray($table, $column)
	{
		$sqlCode	= "SELECT {$column} FROM {$table}";
		$query	= $this->connection->prepare($sqlCode);
		$query->execute();
		$dataList = $query->fetchAll(PDO::FETCH_ASSOC);
		$totalRowSelected = $query->rowCount();

		if ($totalRowSelected > 0) {
			return $dataList;
		} else {
			return 0;
		}
	}
}
