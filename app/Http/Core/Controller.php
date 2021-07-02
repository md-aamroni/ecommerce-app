<?php

namespace App\Http\Core;

use App\Http\Core\Database;

class Controller extends Database
{
	public $connection;

	public function __construct()
	{
		$this->connection = $this->connection();
	}

	public function makeHash($password)
	{
		$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
		return $hash;
	}

	public function verifyHash($password, $stored)
	{
		$verify = password_verify($password, $stored);
		return $verify;
	}

	public function redirect($location)
	{
		return header("Location:{$location}");
		exit();
	}

	public function createToken()
	{
		$seeds   = $this->urlSafeEncode(random_bytes(8));
		$time    = time();
		$hash    = $this->urlSafeEncode(hash_hmac('sha256', $seeds . $time, TOKEN, true));
		return $this->urlSafeEncode($hash . '|' . $seeds . '|' . $time);
	}

	public function urlSafeEncode($string)
	{
		return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
	}

	public function validateToken($token)
	{
		$parseToken = explode('|', $this->urlSafeDecode($token));
		if (count($parseToken) === 3) {
			$hash = hash_hmac('sha256', $parseToken[1] . $parseToken[2], TOKEN, true);
			if (hash_equals($hash, $this->urlSafeDecode($parseToken[0]))) {
				return true;
			}
		}
		return false;
	}

	public function urlSafeDecode($string)
	{
		return base64_decode(strtr($string, '-_', '+/'));
	}

	public function encode($string)
	{
		return trim(htmlentities(addslashes($string)));
	}

	public function decode($string)
	{
		return trim(htmlspecialchars_decode(stripslashes($string)));
	}

	public function checkImage($fileType, $fileSize, $fileError)
	{
		if ((($fileType == "image/gif") || ($fileType == "image/jpeg") || ($fileType == "image/jpg") || ($fileType == "image/pjpeg") || ($fileType == "image/x-png") || ($fileType == "image/png")) && ($fileSize < 52428800) && ($fileError <= 0)) {
			return 1;
		} else {
			return 0;
		}
	}

	public function mobileNoParser($string)
	{
		$mobile   = explode(' ', $string);
		return str_replace('-', '', $mobile[1]);
	}
}
