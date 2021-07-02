<?php

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayout('session');
$view->loadLayout('ecommerce.top');
$view->loadLayout('ecommerce.header');
$view->loadLayout('ecommerce.sidebar');
$view->loadContent('product.details');
$view->loadLayout('ecommerce.tail');
