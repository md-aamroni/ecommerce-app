

<?php

include('app/Http/Core/View.php');

$view = new View;

$view->loadLayouts('ecommerce.top');
$view->loadLayouts('ecommerce.header');
$view->loadContent('ecommerce.category-horizontal-filter2');
$view->loadLayouts('ecommerce.tail');
