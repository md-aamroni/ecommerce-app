<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayouts('admin.top');
$view->loadContent('auth.login');
//$view->loadLayouts('admin.tail');

