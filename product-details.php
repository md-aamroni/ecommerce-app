<?php
echo 'product- details';

include './../app/Http/Core/View.php';

$view = new View;

$view->loadLayouts('session');
$view->loadLayouts('ecommerce.top');
$view->loadLayouts('ecommerce.header');
$view->loadLayouts('ecommerce.sidebar');
$view->loadContent('product.details');
$view->loadLayouts('ecommerce.tail');
