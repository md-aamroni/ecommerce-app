<?php

include('./../bootstrap/View.php');

View::init();

View::layouts('session');
View::layouts('admin.top');
View::layouts('admin.header');
View::layouts('admin.sidebar');
View::content('settings.terms-and-condition');
View::layouts('admin.tail');
