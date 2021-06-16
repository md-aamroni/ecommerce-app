<?php

class UpdateController extends Controller
{
	protected $table;
	protected $column;
	protected $status;
	protected $total;
	protected $id;

	public function changeStatus($table, $column, $status, $id)
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

	public function orderTotalAmount($table, $total, $id)
	{
		$this->table	= $this->encode($table);
		$this->total	= $total;
		$this->id		= $this->encode($id);

		$sqlCode	= "UPDATE $this->table
						SET `total_amount` = :TOTAL_AMOUNT, `updated_at` = :UPDATED_AT 
						WHERE `id` = :UPDATE_ID";

		$query 	= $this->connection->prepare($sqlCode);
		$values	= array(
			':TOTAL_AMOUNT'	=> is_array($this->total) ? array_sum($this->total) : $this->total,
			':UPDATED_AT'		=> date("Y-m-d H:i:s"),
			':UPDATE_ID'		=> $this->id
		);

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
