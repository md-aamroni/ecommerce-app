<?php

include('app/Http/Core/View.php');

$view = new View;

$view->loadLayout('ecommerce.top');
$view->loadLayout('ecommerce.header');
$view->loadContent('ecommerce.product-grid-layout');
$view->loadLayout('ecommerce.tail');