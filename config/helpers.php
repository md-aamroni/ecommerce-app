<?php

/** Helpers */
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
	if (file_exists("./../public/" . $fileName)) {
		$getPath = "./../public/" . $fileName;
	} else {
		$getPath = "public/" . $fileName;
	}

	if (is_bool($version) && $version === true) {
		$filePath = $getPath . '?' . rand(0, 9) . '.' . rand(0, 9);
	} else {
		$filePath = $getPath;
	}

	return $filePath;
}


function currentPageTitle($appName = APP['title'], $type = null)
{
	$pageName	= basename($_SERVER['PHP_SELF']);
	$parseDash	= strpos($pageName, '-');

	if (!is_null($type)) {
		$type = ' ' . $type . ' ';
	} else {
		$type = ' - ';
	}

	if (is_null($appName)) {
		if ($parseDash > 0) {
			$pageTitle = ucwords(str_replace('.php', '', str_replace('-', ' ', $pageName)));
		} else {
			$pageTitle = ucwords(str_replace('.php', '', $pageName));
		}
	}

	if (!is_null($appName)) {
		if ($parseDash > 0) {
			$pageTitle = ucwords(str_replace('.php', '', str_replace('-', ' ', $pageName)) . $type . $appName);
		} else {
			$pageTitle = ucwords(str_replace('.php', '', $pageName) . $type . $appName);
		}

		if ($pageName == "index.php") {
			$pageTitle = ucwords(str_replace('.php', '', 'home') . $type . $appName);
		}
	}

	echo $pageTitle;
}
