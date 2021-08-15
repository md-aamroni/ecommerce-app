<?php

/** Application Configuration */
define('TOKEN', sha1('CSRF_TOKEN_SECRET'));

define('APP', array(
	'title'		=> 'Ecommerce App',
	'path'		=> getFullHost(),
	'country'	=> 'BANGLADESH',
	'code'		=> '+88',
	'symbol'		=> '&#2547;',
	'currency'	=> 'tk/BDT',
	'tax'			=> 7.5,
	'return'		=> 'Free returns. Standard shipping orders'
));


define('POLICY', array(
	'shiping'	=> array(
		'icon'		=> 'fas fa-shipping-fast',
		'title'		=> 'FREE SHIPPING & RETURN',
		'subtitle'	=> 'Free shipping on all orders over $99'
	),
	'gurentee'	=> array(
		'icon'		=> 'fas fa-dollar-sign',
		'title'		=> 'MONEY BACK GUARANTEE',
		'subtitle'	=> '100% money back guarantee'
	),
	'support'	=> array(
		'icon'		=> 'fas fa-headset',
		'title'		=> 'ONLINE SUPPORT 24/7',
		'subtitle'	=> 'Lorem ipsum dolor sit amet.'
	)
));


define('FEATURE', array(
	'support'	=> array(
		'icon'			=> 'fas fa-headset',
		'title'			=> 'Customer Support',
		'subtitle'		=> 'Need Assistance?',
		'discription'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.'
	),
	'payment'	=> array(
		'icon'			=> 'far fa-credit-card',
		'title'			=> 'Secured Payment',
		'subtitle'		=> 'Safe & Fast',
		'discription'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.'
	),
	'returns'	=> array(
		'icon'			=> 'fas fa-undo-alt',
		'title'			=> 'Returns',
		'subtitle'		=> 'Easy & Free',
		'discription'	=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.'
	),

));




/** Direcotory Path */
function getFullHost()
{
	$protocol = $_SERVER['REQUEST_SCHEME'] . '://';
	$host		 = $_SERVER['HTTP_HOST'] . '/';
	$explode	 = explode('/', $_SERVER['REQUEST_URI']);
	if (count($explode) === 5) {
		$project = $explode[1] . '/' . $explode[2];
	} else {
		$project = $explode[1];
	}
	return $protocol . $host . $project;
}


function baseFile()
{
	return str_replace('.php', '', basename($_SERVER['PHP_SELF']));
}
