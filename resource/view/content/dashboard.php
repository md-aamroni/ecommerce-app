<?php

use App\Http\Controllers\UserController;

$user = new UserController;



echo '<pre>';
print_r($user->index());
echo '</pre>';
?>
