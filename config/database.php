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
	'sqlite'	=> [
		'driver'		=> 'sqlite',
		'url'			=> __DIR__ . '/ecommerce_app_rdb.sqlite',
		'database'	=> 'ecommerce_app_rdb',
		'prefix'		=> '',
		'fk_const'	=> ''	// foreign key constraints
	],
	'pgsql'		=> [
		'driver'		=> 'pgsql',
		'url'			=> '',
		'host'		=> 'localhost',
		'port'		=> '5432',
		'database'	=> 'ecommerce_app_rdb',
		'username'	=> 'root',
		'password'	=> '',
		'charset'	=> 'utf8mb4',
		'collation'	=> '',
		'prefix'		=> ''
	],
];

define('DB', $GLOBALS['DB_CONFIG']['mysql']);
