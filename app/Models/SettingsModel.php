<?php

namespace App\Models;

use Exception;
use App\Eloquent\EloquentORM;

class SettingsModel extends EloquentORM
{
   protected $table = 'settings';
   protected $title;
   protected $details;
   protected $id;

   protected function addDocumentSettings($title, $details)
   {
      $this->title   = $this->encode($title);
      $this->details = $this->encode($details);

      $sqlCode = "INSERT INTO $this->table (
                     `title`, `details`, `created_at`
                  ) VALUES (
                     :S_TITLE, :S_DETAILS, :CREATED_AT
                  )";

      $queries   = $this->connection->prepare($sqlCode);
      $bindParam = array(
         ':S_TITLE'     => $this->title,
         ':S_DETAILS'   => $this->details,
         ':CREATED_AT'  => date("Y-m-d H:i:s")
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
            $totalRowCount = $queries->rowCount();
            $lastInsertId  = $this->connection->lastInsertId();

            return array(
               'totalRowInsert' => $totalRowCount,
               'lastInsertID'   => $lastInsertId,
            );
         }
      } catch (Exception $e) {
         return $e->getMessage();
      }
   }

   protected function updateDocumentSettings($title, $details, $id)
   {
      $this->title   = $this->encode($title);
      $this->details = $this->encode($details);
      $this->id      = $this->encode($id);

      $sqlCode = "UPDATE $this->table
                  SET
							`title` = :S_TITLE, `details` = :S_DETAILS, `updated_at` = :UPDATED_AT
                  WHERE
							`id` = :UPDATE_ID";

      $queries = $this->connection->prepare($sqlCode);
      $values  = array(
         ':S_TITLE'     => $this->title,
         ':S_DETAILS'   => $this->details,
         ':UPDATED_AT'  => date("Y-m-d H:i:s"),
         ':UPDATE_ID'   => $this->id
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
