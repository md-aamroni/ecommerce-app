<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;

class SettingsController extends SettingsModel
{
   public function getAboutUs()
   {
      return $this->findOn($this->table, 'title', '"About Us"');
   }

   public function create($title, $details)
   {
      return $this->addDocumentSettings($title, $details);
   }

   public function update($title, $details, $id)
   {
      return $this->updateDocumentSettings($title, $details, $id);
   }
}
