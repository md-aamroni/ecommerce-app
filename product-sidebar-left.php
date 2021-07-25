
<?php

include('bootstrap/View.php');

View::init();

View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('ecommerce.product-sidebar-left');
View::layouts('ecommerce.tail');
