

<?php

include('bootstrap/View.php');

View::init();

View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('ecommerce.category-horizontal-filter2');
View::layouts('ecommerce.tail');
