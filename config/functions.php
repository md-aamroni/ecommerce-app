<?php

/** Reusable Functions */
function notification($type, $message)
{
	return '<script>round_' . $type . '_noti("' . $message . '")</script>';
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
