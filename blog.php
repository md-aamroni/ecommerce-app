<?php

include('bootstrap/View.php');

View::init();

View::layouts('ecommerce.top');
View::layouts('ecommerce.header');
View::content('blog-post.blog');
View::layouts('ecommerce.tail');
