<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('admin.top');
$view->loadContent('auth.login');
$view->loadLayout('admin.tail');
