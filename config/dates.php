<?php

/** Date Converter */
function dateFormat($string, $type = null)
{
	$x = getDate(strtotime($string));

	switch ($type) {
		case 0:
			$format = $x['mday'] . ' ' . $x['month'] . ', ' . $x['year'];
			break;
		case 1:
			$format = $x['month'] . ' ' . $x['mday'] . ', ' . $x['year'];
			break;
		case 2:
			$format = $x['weekday'] . ' ' . $x['mday'] . ' ' . $x['month'] . ', ' . $x['year'];
			break;
		case 3:
			$format = date('D j F, Y', strtotime($string));
			break;
		case 4:
			$format = date('D, j M Y, H:i:s A', strtotime($string));
			break;
		case 5:
			$format = date('D, j M Y, h:i:s A', strtotime($string));
			break;
		case 6:
			$format = date('D, j M Y, h:i A', strtotime($string));
			break;
		case 7:
			$format = date('h:i A', strtotime($string));
			break;
		default:
			$format = date('M F, Y', strtotime($string));
			break;
	}

	return $format;
}


function timeCount($datetime, $full = false)
{
	$now  = new DateTime;
	$ago  = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);

	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) {
		$string = array_slice($string, 0, 1);
	}

	return $string ? implode(', ', $string) . ' ago' : 'Just now';
}


function dateDiff($string, $type = 'years')
{
	$diff   = abs(strtotime($string) - strtotime(date('Y-m-d')));
	$years  = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	$days   = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

	switch ($type) {
		case 'months':
			$result = $months;
			break;
		case 'days':
			$result = $days;
			break;
		default:
			$result = $years;
			break;
	}

	return $result;
}


function totalTime($start, $end, $differentiate = 'hour')
{
	$startDate        = strtotime($start);
	$endDate          = strtotime($end);
	$totalSecondsDiff = abs($startDate - $endDate);
	$totalMinutesDiff = $totalSecondsDiff / 60;
	$totalHoursDiff   = $totalSecondsDiff / 60 / 60;
	$totalDaysDiff    = $totalSecondsDiff / 60 / 60 / 24;
	$totalMonthsDiff  = $totalSecondsDiff / 60 / 60 / 24 / 30;
	$totalYearsDiff   = $totalSecondsDiff / 60 / 60 / 24 / 365;

	switch ($differentiate) {
		case 'second':
			$timeCalculation = $totalSecondsDiff;
			break;
		case 'minute':
			$timeCalculation = $totalMinutesDiff;
			break;
		case 'day':
			$timeCalculation = ceil($totalDaysDiff);
			break;
		case 'month':
			$timeCalculation = $totalMonthsDiff;
			break;
		case 'year':
			$timeCalculation = $totalYearsDiff;
			break;
		default:
			$timeCalculation = $totalHoursDiff;
			break;
	}

	return $timeCalculation;
}


function months()
{
	$months = [];
	for ($m = 1; $m <= date('n'); ++$m) {
		array_push($months, date('M', mktime(0, 0, 0, $m, 1)));
	}
	return $months;
}


function sqlMonth($string, $isFullName = false)
{
	if (is_bool($isFullName) && $isFullName === true) {
		$explode = getDate(strtotime($string));
		$month   = $explode['month'];
	} else {
		$month 	= date('M', strtotime($string));
	}

	return $month;
}


function sqlYear($string)
{
	return date('Y', strtotime($string));
}


function sqlDate($string, $type = null)
{
	switch ($type) {
		case '1':
			$sqlDateFormat = date('Y-m-d', strtotime($string));
			break;
		case '2':
			$sqlDateFormat = date('H:i a', strtotime($string));
			break;
		default:
			$sqlDateFormat = date('Y-m-d H:i:s', strtotime($string));
			break;
	}
	return $sqlDateFormat;
}


function sqlMonthBetween($string)
{
	$getDate = date('Y-m-01', strtotime($string));
	$result  = '"' . $getDate . '" AND "' . date('Y-m-t', strtotime($getDate)) . '"';
	return $result;
}


function sqlDateBetween($start, $end)
{
	$result = '"' . date('Y-m-d', strtotime($start)) . '" AND "' . date('Y-m-d', strtotime($end)) . '"';
	return $result;
}


function sqlYearBetween($year)
{
	$result = '"' . $year . '-01-01" AND "' . $year . '-12-31"';
	return $result;
}


function dayArray($isFullDayName = false)
{
	$dateArray = null;
	for ($i = 0; $i <= 6; $i++) {
		if (is_bool($isFullDayName) && $isFullDayName === true) {
			$dateArray .= date("l", time() + 86400 * $i) . ",";
		} else {
			$dateArray .= date('D', strtotime('+' . $i . ' day')) . ",";
		}
	}
	$dateArray = rtrim($dateArray, ",");
	$dateArray = explode(',', $dateArray);

	return $dateArray;
}
