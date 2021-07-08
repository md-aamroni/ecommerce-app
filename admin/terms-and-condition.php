<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayouts('session');
$view->loadLayouts('admin.top');
$view->loadLayouts('admin.header');
$view->loadLayouts('admin.sidebar');
$view->loadContent('admin.terms-and-condition');
$view->loadLayouts('admin.tail');
