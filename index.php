<?php

include('bootstrap/View.php');

View::init();
View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('ecommerce.index');
View::layouts('ecommerce.tail');
