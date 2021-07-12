<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class SubCategoryModel extends EloquentORM
{
	protected $table = 'sub_categories';
	protected $id;
	protected $cat_id;
	protected $title;
	protected $slug;
	protected $isStock;
	protected $banner;
	protected $status;

	protected function addNewSubCategory($category, $title, $banner, $status)
	{
		$this->cat_id	= $this->encode($category);
		$this->title	= $this->encode($title);
		$this->slug		= makeSlug($this->encode($title));
		$this->isStock	= 'Not Yet';
		$this->banner	= $this->encode($banner);
		$this->status	= !empty($this->encode($status)) ? $this->encode($status) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (
							`category_id`, `title`, `slug`, `is_stock`, `banner`, `status`, `created_at`
						)
						VALUES (
							:S_CAT_ID, :S_TITLE, :S_SLUG, :S_IS_STOCK, :S_BANNER, :S_STATUS, :CREATED_AT
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
			':S_CAT_ID'		=> $this->cat_id,
			':S_TITLE'		=> $this->title,
			':S_SLUG'		=> $this->slug,
			':S_IS_STOCK'	=> $this->isStock,
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


	protected function updateSubCategory($category, $title, $banner, $status, $id)
	{
		$this->cat_id	= $this->encode($category);
		$this->title	= $this->encode($title);
		$this->slug		= makeSlug($this->encode($title));
		$this->banner	= $this->encode($banner);
		$this->status	= $this->encode($status);
		$this->id		= $this->encode($id);

		$sqlCode = "UPDATE $this->table
                  SET
							`category_id` = :S_CAT_ID, `title` = :S_TITLE, `slug` = :S_SLUG, `banner` = :S_BANNER, `status` = :S_STATUS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
			':S_CAT_ID'		=> $this->cat_id,
			':S_TITLE'		=> $this->title,
			':S_SLUG'		=> $this->slug,
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
