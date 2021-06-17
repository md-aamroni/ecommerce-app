<?php

/** Database Configuration */
$GLOBALS['DB_CONFIG'] = [
	'mysql'		=> [
		'driver'		=> 'mysql',
		'url'			=> '',
		'host'		=> 'localhost',
		'port'		=> '3306',
		'database'	=> 'ecommerce_app_rdb',
		'username'	=> 'root',
		'password'	=> '',
		'charset'	=> 'utf8mb4',
		'collation'	=> 'utf8mb4_unicode_ci',
		'prefix'		=> ''
	],
	'sqllite'	=> [
		'driver'		=> '',
		'url'			=> '',
		'database'	=> '',
		'prefix'		=> '',
		'fk_const'	=> ''		// foreign key constraints
	],
	'pgsql'		=> [
		'driver'		=> '',
		'url'			=> '',
		'host'		=> '',
		'port'		=> '',
		'database'	=> '',
		'username'	=> '',
		'password'	=> '',
		'charset'	=> '',
		'collation'	=> '',
		'prefix'		=> ''
	],
];

define('DB', $GLOBALS['DB_CONFIG']['mysql']);
