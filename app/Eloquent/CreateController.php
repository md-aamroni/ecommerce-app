<?php

class CreateController extends Controller
{
   protected $table;
   protected $user;
   protected $service;
   protected $title;
   protected $id;

   public function myWishlist($user, $service, $title)
   {
      $this->table   = 'app_wishlists';
      $this->user    = $this->encode($user);
      $this->service = $this->encode($service);
      $this->title   = ucwords(strtolower($this->encode($title)));

      $sqlCode = "INSERT INTO $this->table (`users_id`, `services_id`, `services_title`, `created_at`)
                  VALUES (:W_USER_ID, :W_SERVICE_ID, :W_SERVICE_TITLE, :CREATED_AT)";

      $query   = $this->connection->prepare($sqlCode);
      $values  = array(
         ':W_USER_ID'         => $this->user,
         ':W_SERVICE_ID'      => $this->service,
         ':W_SERVICE_TITLE'   => $this->title,
         ':CREATED_AT'        => date("Y-m-d H:i:s")
      );

      try {
         if ($query->execute($values)) {
            $totalRowInserted   = $query->rowCount();
            $lastInsertId       = $this->connection->lastInsertId();

            return array(
               'totalRowInsert'  => $totalRowInserted,
               'lastInsertID'    => $lastInsertId,
            );
         } else {
            throw new Exception();
         }
      } catch (Exception $e) {
         return false;
      }
   }
}
