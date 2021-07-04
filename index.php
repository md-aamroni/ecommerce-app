<?php

include 'app/Http/Core/View.php';

$view = new View;



$view->loadLayout('frontend.top');
$view->loadContent('frontend.index');
$view->loadLayout('frontend.tail');
?>

