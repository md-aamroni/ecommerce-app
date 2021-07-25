

<?php

include('bootstrap/View.php');

View::init();

View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('ecommerce.category-banner-boxed-image');
View::layouts('ecommerce.tail');
