<?php

session_start();

class View
{
	public function __construct()
	{
		if (file_exists('./../vendor/autoload.php')) {
			include './../vendor/autoload.php';
		} else {
			include 'vendor/autoload.php';
		}

		if (file_exists('./../config/bootstrap.php')) {
			include './../config/bootstrap.php';
		} else {
			include 'config/bootstrap.php';
		}

		if (file_exists('./../component/app.php')) {
			include './../component/app.php';
		} else {
			include 'component/app.php';
		}
	}


	public function loadContent($page)
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


	public function loadLayouts($page)
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
