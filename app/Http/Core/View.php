<?php

namespace App\Http\Core;

session_start();

class View
{
   public function __construct()
   {
		if (file_exists('./../config/bootstrap.php')) {
			require './../config/bootstrap.php';
		} else {
			require 'config/bootstrap.php';
		}

		if (file_exists('./../component/app.php')) {
			require './../component/app.php';
		} else {
			require 'component/app.php';
		}
   }

   public function loadLayout($page)
   {

   }

   public function loadContent($page)
   {

   }
}
