<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('session');
$view->loadLayout('admin.top');
$view->loadLayout('admin.header');
$view->loadLayout('admin.sidebar');
// $view->loadContent('admin.customer');
echo 'Slider List';
$view->loadLayout('admin.tail');
