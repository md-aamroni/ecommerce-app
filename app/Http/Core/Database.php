<?php

namespace App\Http\Core;

use PDO;
use PDOException;

class Database
{
   private $driver;
   private $host;
   private $database;
   private $charset;
   private $user;
   private $password;
   private $dsn;
   private $db;

   protected function connection()
   {
      $this->driver     = '';
      $this->host       = '';
      $this->database   = '';
      $this->charset    = '';
      $this->user       = '';
      $this->password   = '';
      $this->dsn        = $this->driver . ':' . $this->host . ':' . $this->database . ':' . $this->charset;

      try {
         $this->db = new PDO($this->dsn, $this->user, $this->password);
         $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

         return $this->db;
      } catch (PDOException $e) {
         return 'Connection error: ' . $e->getMessage();
      }
   }
}
