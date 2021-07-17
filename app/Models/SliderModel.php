<?php
namespace App\Models;
use Exception;
use App\Eloquent\EloquentORM;

class SliderModel extends EloquentORM
{
	protected $table = 'sliders';
	protected $id;
	protected $title;
	protected $sub_title;
	protected $banner;
	protected $status;

	protected function addNewSlider($title,$sub_title, $banner, $status)
	{
		
		$this->title	= $this->encode($title);
		$this->sub_title	= $this->encode($sub_title);
		$this->banner	= $this->encode($banner);
		$this->status	= !empty($this->encode($status)) ? $this->encode($status) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (
							`id`, `title`,`sub_title`, `banner`, `status`, `created_at`
						)
						VALUES (
							:S_CAT_ID, :TITLE,:S_TITLE,  :S_BANNER, :S_STATUS, :CREATED_AT
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':S_CAT_ID'		=> $this->id,
			':TITLE'		=> $this->title,
			':S_TITLE'		=> $this->sub_title,
			':S_BANNER'		=> $this->banner,
			':S_STATUS'		=> $this->status,
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


	protected function updateSlider($title,$sub_title, $banner, $status, $id)
	{
		
		$this->title	= $this->encode($title);
		$this->sub_title	= $this->encode($sub_title);
		$this->banner	= $this->encode($banner);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		$sqlCode = "UPDATE $this->table
                  SET
							`id` = :S_ID, `title` = :S_TITLE, `sub_title` = :S_sub_title, `banner` = :S_BANNER, `status` = :S_STATUS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
			':S_ID'		=> $this->id,
			':S_TITLE'		=> $this->title,
			':S_sub_title'		=> $this->sub_title,
			':S_BANNER'		=> $this->banner,
			':S_STATUS'		=> $this->status,
			':UPDATED_AT'	=> date("Y-m-d H:i:s"),
			':UPDATE_ID'	=> $this->id
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
