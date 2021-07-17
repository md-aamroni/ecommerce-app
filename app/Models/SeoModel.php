<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class SeoModel extends EloquentORM
{

   protected $table = 'seo';
   protected $id;
   protected $page_url;
   protected $priority;
   protected $status;
   protected $keywords;
   protected $description;

   protected function addNewPage($page_url, $priority, $status, $keywords, $description)
   {
      $this->page_url   = $this->encode($page_url);
      $this->priority   = !empty($this->encode($priority)) ? $this->encode($priority) : '0.50';
      $this->status   = !empty($this->encode($status)) ? $this->encode($status) : 'Active';
      $this->keywords   = $this->encode($keywords);
      $this->description   = $this->encode($description);

      //page_url	priority	status	keywords	description
      $sqlCode   = "INSERT INTO $this->table (
							`page_url`, `priority`, `status`,`keywords`, `description`,  `created_at`
						)
						VALUES (
							:S_PAGE_URL, :S_PRIORITY, :S_STATUS, :S_KEYWORD, :S_DESCRIPTION, :CREATED_AT
						)";

      $queries   = $this->connection->prepare($sqlCode);
      $bindParam = array(
         ':S_PAGE_URL'      => $this->page_url,
         ':S_PRIORITY'      => $this->priority,
         ':S_STATUS'      => $this->status,
         ':S_KEYWORD'   => $this->keywords,
         ':S_DESCRIPTION'   => $this->description,
         ':CREATED_AT'   => date("Y-m-d H:i:s")
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
            $totalRowCount   = $queries->rowCount();
            $lastInsertId   = $this->connection->lastInsertId();

            return array(
               'totalRowInsert'   => $totalRowCount,
               'lastInsertID'      => $lastInsertId,
            );
         }
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }


   protected function updateSeoPage($page_url, $priority, $status, $keywords, $description, $id)
   {
   	$this->page_url   = $this->encode($page_url);
      $this->priority   = !empty($this->encode($priority)) ? $this->encode($priority) : '0.50';
      $this->status   = !empty($this->encode($status)) ? $this->encode($status) : 'Active';
      $this->keywords   = $this->encode($keywords);
      $this->description   = $this->encode($description);
      $this->id		= $this->encode($id);

   	$sqlCode = "UPDATE $this->table
                  SET
   						`page_url` = :S_PAGE_URL, `priority` = :S_PRIORITY, `status` = :S_STATUS, `keywords` = :S_KEYWORD, `description` = :S_DESCRIPTION, `updated_at` = :UPDATED_AT
                  WHERE
   						`id` = :UPDATE_ID";

   	$queries = $this->connection->prepare($sqlCode);
   	$values  = array(
   		':S_PAGE_URL'     => $this->page_url,
         ':S_PRIORITY'     => $this->priority,
         ':S_STATUS'       => $this->status,
         ':S_KEYWORD'      => $this->keywords,
         ':S_DESCRIPTION'  => $this->description,
   		':UPDATED_AT'     => date("Y-m-d H:i:s"),
         ':UPDATE_ID'      => $this->id
   		
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
