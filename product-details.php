<?php
echo 'product- details';

include('./../bootstrap/View.php');

View::init();

View::layouts('session');
View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::layouts('ecommerce.sidebar');
View::content('product.details');
View::layouts('ecommerce.tail');
