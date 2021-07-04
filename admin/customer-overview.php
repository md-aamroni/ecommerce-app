<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('session');
$view->loadLayout('admin.top');
$view->loadLayout('admin.header');
$view->loadLayout('admin.sidebar');
// $view->loadContent('admin.customer');
echo 'customer over view';
$view->loadLayout('admin.tail');
