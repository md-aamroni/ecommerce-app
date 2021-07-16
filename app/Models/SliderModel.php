<?php
<<<<<<< HEAD
namespace App\Models;
=======

namespace App\Models;

>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
use Exception;
use App\Eloquent\EloquentORM;

class SliderModel extends EloquentORM
{
	protected $table = 'sliders';
	protected $id;
	protected $title;
<<<<<<< HEAD
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
=======
   protected $sub_title;
	protected $images;
	protected $alt_text;
	protected $sequence;
	protected $is_activ;

	protected function addNewSlider( $title,$sub_title, $images, $alt_text,$is_activ)
	{
		$this->title	= $this->encode($title);
      $this->sub_title	= $this->encode($sub_title);
		$this->images	= $this->encode($images);
      $this->alt_text	= $this->encode($alt_text);
		$this->sequence	= 'Not Yet';
		$this->is_activ	= !empty($this->encode($is_activ)) ? $this->encode($is_activ) : 'Active';

		$sqlCode	= "INSERT INTO $this->table (
							 `title`, `sub_title`, `images`, `alt_text`, `sequence`, `is_active`, `created_at`
						)
						VALUES (
							 :S_TITLE, :S_SUB_TITLE, :S_IMAGES, :S_ALT_TEXT, :S_SEQUENCE, :S_IS_ACTIVE, :CREATED_AT
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
						)";

		$queries	= $this->connection->prepare($sqlCode);
		$bindParam = array(
<<<<<<< HEAD
			':S_CAT_ID'		=> $this->id,
			':TITLE'		=> $this->title,
			':S_TITLE'		=> $this->sub_title,
			':S_BANNER'		=> $this->banner,
			':S_STATUS'		=> $this->status,
=======
			':S_TITLE'		=> $this->title,
			':S_SUB_TITLE'	=> $this->sub_title,
			':S_IMAGES'		=> $this->images,
			':S_ALT_TEXT'		=> $this->alt_text,
			':S_SEQUENCE'		=> $this->sequence,
         ':S_IS_ACTIVE'		=> $this->is_activ,
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
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


<<<<<<< HEAD
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
=======
	protected function updateSlider( $title, $sub_title, $images, $alt_text, $is_active, $id)
	{
		$this->title	   = $this->encode($title);
      $this->sub_title	= $this->encode($sub_title);
      $this->images	   = $this->encode($images);
		$this->alt_text	= $this->encode($alt_text);
		$this->is_active	= $this->encode($is_active);
		$this->id	      = $this->encode($id);

		

		$sqlCode = "UPDATE $this->table
                  SET
							`title` = :S_TITLE, `sub_title` = :S_SUBTITLE, `images` = :S_IMAGES, `alt_text` = :S_ALT, `is_active` = :S_IS_ACTIVE, `updated_at` = :UPDATED_AT
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
                  WHERE
							`id` = :UPDATE_ID";

		$queries = $this->connection->prepare($sqlCode);
		$values  = array(
<<<<<<< HEAD
			':S_ID'		=> $this->id,
			':S_TITLE'		=> $this->title,
			':S_sub_title'		=> $this->sub_title,
			':S_BANNER'		=> $this->banner,
			':S_STATUS'		=> $this->status,
=======
			':S_TITLE'		=> $this->title,
			':S_SUBTITLE'		=> $this->sub_title,
			':S_IMAGES'		=> $this->images,
			':S_ALT'		   => $this->alt_text,
			':S_IS_ACTIVE'	=> $this->is_active,
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
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
<<<<<<< HEAD

=======
>>>>>>> 99c19e599fdf3e0132a8bc71169a67b6a30ccb31
