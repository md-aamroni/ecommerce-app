<?php 

namespace App\Http\Controllers;

use App\Eloquent\EloquentORM;

class NavigationController extends EloquentORM
{
   public function navbarCategory()
   {
      return $this->findOn('categories', 'status', '"Active"');
   }

   public function navbarSubCategory($category_id)
   {
      return $this->findOn('sub_categories', 'status', '"Active"', 'category_id', $category_id);
   }
}