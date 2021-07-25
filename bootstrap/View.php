<?php

session_start();


class View
{
	public static function init()
	{
		if (file_exists('./../../bootstrap/app.php')) {
			include './../../bootstrap/app.php';
		} elseif (file_exists('./../bootstrap/app.php')) {
			include './../bootstrap/app.php';
		} else {
			include './bootstrap/app.php';
		}
	}


	public static function content($page)
	{
		if (strpos($page, '/')) {
			$dir = explode('/', $page);
			if (file_exists('./../resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php')) {
				$filePath = './../resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php';
			} else {
				$filePath = 'resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php';
			}
		} elseif (strpos($page, '.')) {
			$dir = explode('.', $page);
			if (file_exists('./../resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php')) {
				$filePath = './../resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php';
			} else {
				$filePath = 'resource/view/content/' . $dir[0] . '/' . $dir[1] . '.php';
			}
		} else {
			$dir = '';
			if (file_exists('./../resource/view/content/' . $page . '.php')) {
				$filePath = './../resource/view/content/' . $page . '.php';
			} else {
				$filePath = 'resource/view/content/' . $page . '.php';
			}
		}

		if (file_exists($filePath)) {
			require_once $filePath;
		}
	}


	public static function layouts($page)
	{
		if (strpos($page, '/')) {
			$dir = explode('/', $page);
			if (file_exists('./../resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php')) {
				$filePath = './../resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php';
			} else {
				$filePath = 'resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php';
			}
		} elseif (strpos($page, '.')) {
			$dir = explode('.', $page);
			if (file_exists('./../resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php')) {
				$filePath = './../resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php';
			} else {
				$filePath = 'resource/view/include/' . $dir[0] . '/' . $dir[1] . '.php';
			}
		} else {
			$dir = '';
			if (file_exists('./../resource/view/include/' . $page . '.php')) {
				$filePath = './../resource/view/include/' . $page . '.php';
			} else {
				$filePath = 'resource/view/include/' . $page . '.php';
			}
		}

		if (file_exists($filePath)) {
			require_once $filePath;
		}
	}
}
