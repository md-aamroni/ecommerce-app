<?php

/**
 * Autoload Vendor Files
 * 
 */
if (file_exists('./../vendor/autoload.php')) {
	include './../vendor/autoload.php';
} else {
	include 'vendor/autoload.php';
}



/**
 * Config Listing
 * 
 */
$configs = [
	'database.php',
	'dates.php',
	'functions.php',
	'helpers.php',
	'invoice.php',
	'server.php',
	'site.php',
	'storage.php',
];


/**
 * Components Listing
 * 
 */
$components = [
	'_card.php',
	'_delete.php',
	'_status.php',
];



/**
 * Load Required Files
 * 
 */
foreach ($configs as $config) {
	if (file_exists('./../../config/' . $config)) {
		include './../../config/' . $config;
	} elseif (file_exists('./../config/' . $config)) {
		include './../config/' . $config;
	} else {
		include './config/' . $config;
	}
}

foreach ($components as $component) {
	if (file_exists('./../../components/' . $component)) {
		include './../../components/' . $component;
	} elseif (file_exists('./../components/' . $component)) {
		include './../components/' . $component;
	} else {
		include './components/' . $component;
	}
}