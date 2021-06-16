<?php

/**
 * Content  :
 * Date     :
 * Feature  :
 */
function dd($var, $type = null)
{
	if (!is_null($type) && $type === 'json') {
		echo json_encode($var, JSON_PRETTY_PRINT);
	} elseif (!is_null($type) && $type === 'dump') {
		if (is_array($var)) {
			echo '<pre>';
			var_dump($var);
			echo '</pre>';
		} else {
			echo $var . ' (type of "' . gettype($var) . '" ' . strlen($var) . ')';
		}
	} else {
		if (is_array($var)) {
			echo '<pre>';
			print_r($var);
			echo '</pre>';
		} else {
			echo $var . ' (type of "' . gettype($var) . '" ' . strlen($var) . ')';
		}
	}
}


function asset($fileName, $version = false)
{
	if (file_exists("./../public/assets/" . $fileName)) {
		$getPath = "./../public/assets/" . $fileName;
	} else {
		$getPath = "public/assets/" . $fileName;
	}

	if (is_bool($version) && $version === true) {
		$filePath = $getPath . '?' . rand(0, 9) . '.' . rand(0, 9);
	} else {
		$filePath = $getPath;
	}

	return $filePath;
}


function pageTitle($appName = APPNAME, $type = null)
{
	$pageName = basename($_SERVER['PHP_SELF']);
	$dash     = strpos($pageName, '-');

	if (!is_null($type)) {
		$type = ' ' . $type . ' ';
	} else {
		$type = ' - ';
	}

	if (is_null($appName)) {
		if ($dash > 0) {
			$title = ucwords(str_replace('.php', '', str_replace('-', ' ', $pageName)));
		} else {
			$title = ucwords(str_replace('.php', '', $pageName));
		}
	}

	if (!is_null($appName)) {
		if ($dash > 0) {
			$title = ucwords(str_replace('.php', '', str_replace('-', ' ', $pageName)) . $type . $appName);
		} else {
			$title = ucwords(str_replace('.php', '', $pageName) . $type . $appName);
		}

		if ($pageName == "index.php") {
			$title = ucwords(str_replace('.php', '', 'home') . $type . $appName);
		}
	}

	echo $title;
}


function arrayMergeUnique($array, $value, $unique = false)
{
	$emptyArray = [];
	foreach ($array as $each) {
		$convertDate	= strtotime($each[$value]);
		$getMonthYear	= getDate($convertDate);
		$getMonthYear	= $getMonthYear['month'] . ' ' . $getMonthYear['year'];
		array_push($emptyArray, $getMonthYear);
	}

	if (is_bool($unique) && $unique === false) {
		return $emptyArray;
	} else {
		return array_unique($emptyArray);
	}
}


function alias($string)
{
	$data  = explode(" ", $string);
	$value = null;
	if (count($data) > 1) {
		$explode = explode(" ", $string);
		foreach ($explode as $i) {
			$value = $value . str_split($i, 1)[0];
		}
	} else {
		$value = str_split($string, 1)[0];
	}

	$alias = $value . '-' . strtoupper(substr(md5(uniqid($value)), 0, 14));
	return $alias;
}


function unique($length = 38)
{
	return substr(md5(uniqid(bin2hex(random_bytes(8)))), 0, $length);
}


function randID()
{
	return substr('#' . strtoupper(md5(uniqid())), 0, 10);
}


function notification($type, $message)
{
	return '<script>round_' . $type . '_noti("' . $message . '")</script>';
}
