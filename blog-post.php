<?php

include('app/Http/Core/View.php');

$view = new View;

$view->loadLayout('ecommerce.top');
$view->loadLayout('ecommerce.header');
$view->loadContent('ecommerce.blog-post');
$view->loadLayout('ecommerce.tail');
