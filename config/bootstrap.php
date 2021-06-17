<?php

if (file_exists('./../config/database.php')) {
	include './../config/database.php';
} else {
	include 'config/database.php';
}

if (file_exists('./../config/dates.php')) {
	include './../config/dates.php';
} else {
	include 'config/dates.php';
}

if (file_exists('./../config/functions.php')) {
	include './../config/functions.php';
} else {
	include 'config/functions.php';
}

if (file_exists('./../config/helpers.php')) {
	include './../config/helpers.php';
} else {
	include 'config/helpers.php';
}

if (file_exists('./../config/invoice.php')) {
	include './../config/invoice.php';
} else {
	include 'config/invoice.php';
}

if (file_exists('./../config/objects.php')) {
	include './../config/objects.php';
} else {
	include 'config/objects.php';
}

if (file_exists('./../config/server.php')) {
	include './../config/server.php';
} else {
	include 'config/server.php';
}

if (file_exists('./../config/site.php')) {
	include './../config/site.php';
} else {
	include 'config/site.php';
}

if (file_exists('./../config/storage.php')) {
	include './../config/storage.php';
} else {
	include 'config/storage.php';
}
