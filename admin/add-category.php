<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('session');
$view->loadLayout('admin.top');
$view->loadLayout('admin.header');
$view->loadLayout('admin.sidebar');
$view->loadContent('category.add-category');
$view->loadLayout('admin.tail');
