<?php

namespace App\Http\Controllers;

use App\Models\UserModel;

class UserController extends UserModel
{
   public function index()
   {
      echo 'Hello '. __METHOD__;
   }

   public function create()
   {
		echo 'Hello '. __METHOD__;
   }

	public function count()
	{
		echo 'Hello '. __METHOD__;
	}

   public function edit()
   {
		echo 'Hello '. __METHOD__;
   }

   public function update()
   {
		echo 'Hello '. __METHOD__;
   }

   public function delete()
   {
		echo 'Hello '. __METHOD__;
  	}
}
