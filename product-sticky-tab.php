
<?php

include('bootstrap/View.php');

View::init();

View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('ecommerce.product-sticky-tab');
View::layouts('ecommerce.tail');
