<?php

include('./../bootstrap/View.php');

View::init();

View::layouts('admin.top');
View::content('auth.login');
//View::layouts('admin.tail');

