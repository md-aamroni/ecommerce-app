<?php

namespace App\Http\Core;

use PDO;
use PDOException;

class Database
{
	protected $driver;
	protected $host;
	protected $database;
	protected $charset;
	protected $username;
	protected $password;
	protected $dsn;
	protected $db;

	protected function connection()
	{
		$this->driver	 = DB['driver'];
		$this->host		 = DB['host'];
		$this->database = DB['database'];
		$this->charset	 = DB['charset'];
		$this->username = DB['username'];
		$this->password = DB['password'];
		$this->dsn		 = '' . $this->driver . ':host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset . '';

		try {
			$this->db = new PDO($this->dsn, $this->username, $this->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			return $this->db;
		} catch (PDOException $e) {
			return 'Connection error: ' . $e->getMessage();
		}
	}
}
