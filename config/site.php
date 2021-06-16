<?php

/**
 * Content	: Application Configuration
 * Date		: 
 * Feature	:
 */
define('APPNAME', 'MediRaj');
define('CSRF_TOKEN_SECRET', sha1('csrf_token_secret')); //4e1a540a21327cb1638bc19d5cf5ac79bcc868ca
define("APPPATH", getFullHost());


/**
 * Content	: Accounts Configuration
 * Date		: 
 * Feature	:
 */
$GLOBALS['COUNTRY_NAME']   = "BANGLADESH";
$GLOBALS['COUNTRY_CODE']   = 19;
$GLOBALS['CURRENCY'] 		= "&#2547;";
$GLOBALS['CURRENCY_NAME']	= "tk/BDT";
$GLOBALS['TAX']				= 7.5;


/**
 * Content  : Direcotory Path
 * Date     : 
 * Features :
 */
$GLOBALS['upDirAdmins']			= "public/uploads/admins/";
$GLOBALS['upDirDoctors']		= "public/uploads/doctors/";
$GLOBALS['upDirUsers']			= "public/uploads/users/";
$GLOBALS['upDirDepartment']	= "public/uploads/department/";
$GLOBALS['upDirMedicine']		= "public/uploads/medicine/";
$GLOBALS['upDirSurgical']		= "public/uploads/surgical/";
$GLOBALS['upDirDiagnostic']	= "public/uploads/diagnostic/";
$GLOBALS['upDirPathology']		= "public/uploads/pathology/";
$GLOBALS['upDirClinic']			= "public/uploads/clinic/";


/**
 * Content  : Direcotory Path
 * Date     : 
 * Features :
 */
function getFullHost()
{
	$protocol   = $_SERVER['REQUEST_SCHEME'] . '://';
	$host       = $_SERVER['HTTP_HOST'] . '/';
	$explode      = explode('/', $_SERVER['REQUEST_URI']);
	if (count($explode) === 5) {
		$project = $explode[1] . '/' . $explode[2];
	} else {
		$project = $explode[1];
	}
	return $protocol . $host . $project;
}


function getPath($url = null)
{
	$explodeURL = explode('/', @$_SERVER['HTTP_REFERER']);
	$lastIndex  = array_pop($explodeURL);
	$getUrlPath = implode('/', $explodeURL);
	$redirectTo = $getUrlPath . '/' . $url;
	return $redirectTo;
}


function apiRoot($url)
{
	$explode = explode('/', $url);
	return ['prefix' => $explode[3], 'endpoint' => str_replace('.php', '', basename($_SERVER['PHP_SELF']))];
}


function isDirectoryUrl()
{
	$current = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
	$baseUrl = str_replace(APPPATH . '/', '', $current . $_SERVER['PHP_SELF']);
	$explode = explode('/', $baseUrl);
	if (count($explode) > 0) {
		$isDir = $explode[0];
		return $isDir;
	}
}


function basePath($isDir = false)
{
	$currentPath = basename($_SERVER['PHP_SELF']);
	if (is_bool($isDir) && $isDir === true) {
		$currentPath = isDirectoryUrl() . '/' . basename($_SERVER['PHP_SELF']);
	}
	return str_replace('.php', '', $currentPath);
}
