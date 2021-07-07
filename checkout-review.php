<?php

include('app/Http/Core/View.php');

$view = new View;

$view->loadLayout('ecommerce.top');
$view->loadLayout('ecommerce.header');
$view->loadContent('ecommerce.checkout-review');
$view->loadLayout('ecommerce.tail');
