<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayouts('session');
$view->loadLayouts('admin.top');
$view->loadLayouts('admin.header');
$view->loadLayouts('admin.sidebar');
$view->loadContent('config.about-us');
$view->loadLayouts('admin.tail');
