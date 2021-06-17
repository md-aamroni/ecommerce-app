<?php
include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('top');
$view->loadContent('admin');
$view->loadLayout('tail');
