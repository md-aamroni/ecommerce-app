<?php

if (file_exists('./../component/_card.php')) {
	require_once './../component/_card.php';
} else {
	require_once 'component/_card.php';
}

if (file_exists('./../component/_delete.php')) {
	require_once './../component/_delete.php';
} else {
	require_once 'component/_delete.php';
}

if (file_exists('./../component/_status.php')) {
	require_once './../component/_status.php';
} else {
	require_once 'component/_status.php';
}
