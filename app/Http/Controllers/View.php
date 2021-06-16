<?php

session_start();

class View
{

	// public function __construct()
	// {
	// 	$this->autoloadClasses();
	// 	$this->configurations();
	// }


	// public function autoloadClasses()
	// {
	// 	spl_autoload_register(function ($class) {
	// 		if (file_exists('./../app/Http/Auth/' . $class . '.php')) {
	// 			include('./../app/Http/Auth/' . $class . '.php');
	// 		} elseif (file_exists('app/Http/Auth/' . $class . '.php')) {
	// 			include('app/Http/Auth/' . $class . '.php');
	// 		}

	// 		if (file_exists('./../app/Http/Controllers/' . $class . '.php')) {
	// 			include('./../app/Http/Controllers/' . $class . '.php');
	// 		} elseif (file_exists('app/Http/Controllers/' . $class . '.php')) {
	// 			include('app/Http/Controllers/' . $class . '.php');
	// 		}

	// 		if (file_exists('./../app/Eloquent/' . $class . '.php')) {
	// 			include('./../app/Eloquent/' . $class . '.php');
	// 		} elseif (file_exists('app/Eloquent/' . $class . '.php')) {
	// 			include('app/Eloquent/' . $class . '.php');
	// 		}

	// 		if (file_exists('./../app/Models/' . $class . '.php')) {
	// 			include('./../app/Models/' . $class . '.php');
	// 		} elseif (file_exists('app/Models/' . $class . '.php')) {
	// 			include('app/Models/' . $class . '.php');
	// 		}
	// 	});
	// }


	// public function configurations()
	// {
	// 	if (file_exists("./../config/Database.php")) {
	// 		include "./../config/Database.php";
	// 	} else {
	// 		include "config/Database.php";
	// 	}

	// 	if (file_exists("./../config/Dates.php")) {
	// 		include "./../config/Dates.php";
	// 	} else {
	// 		include "config/Dates.php";
	// 	}

	// 	if (file_exists("./../config/Helpers.php")) {
	// 		include "./../config/Helpers.php";
	// 	} else {
	// 		include "config/Helpers.php";
	// 	}

	// 	if (file_exists("./../config/Invoice.php")) {
	// 		include "./../config/Invoice.php";
	// 	} else {
	// 		include "config/Invoice.php";
	// 	}

	// 	if (file_exists("./../config/Server.php")) {
	// 		include "./../config/Server.php";
	// 	} else {
	// 		include "config/Server.php";
	// 	}

	// 	if (file_exists("./../config/Site.php")) {
	// 		include "./../config/Site.php";
	// 	} else {
	// 		include "config/Site.php";
	// 	}

	// 	if (file_exists("./../config/UserAgent.php")) {
	// 		include "./../config/UserAgent.php";
	// 	} else {
	// 		include "config/UserAgent.php";
	// 	}

	// 	if (file_exists("./../config/Component.php")) {
	// 		include "./../config/Component.php";
	// 	} else {
	// 		include "config/Component.php";
	// 	}
	// }


	// public function loadContent($page)
	// {
	// 	if (strpos($page, '/')) {
	// 		$isDirectory = explode('/', $page);
	// 		if (file_exists('./../resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php')) {
	// 			$filePath = './../resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		}
	// 	} elseif (strpos($page, '.')) {
	// 		$isDirectory = explode('.', $page);
	// 		if (file_exists('./../resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php')) {
	// 			$filePath = './../resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/content/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		}
	// 	} else {
	// 		$isDirectory = '';
	// 		if (file_exists('./../resource/view/content/' . $page . '.php')) {
	// 			$filePath = './../resource/view/content/' . $page . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/content/' . $page . '.php';
	// 		}
	// 	}

	// 	if (file_exists($filePath)) {
	// 		include $filePath;
	// 	}
	// }


	// public function loadLayouts($page)
	// {
	// 	if (strpos($page, '/')) {
	// 		$isDirectory = explode('/', $page);
	// 		if (file_exists('./../resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php')) {
	// 			$filePath = './../resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		}
	// 	} elseif (strpos($page, '.')) {
	// 		$isDirectory = explode('.', $page);
	// 		if (file_exists('./../resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php')) {
	// 			$filePath = './../resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/include/' . $isDirectory[0] . '/' . $isDirectory[1] . '.php';
	// 		}
	// 	} else {
	// 		$isDirectory = '';
	// 		if (file_exists('./../resource/view/include/' . $page . '.php')) {
	// 			$filePath = './../resource/view/include/' . $page . '.php';
	// 		} else {
	// 			$filePath = 'resource/view/include/' . $page . '.php';
	// 		}
	// 	}

	// 	if (file_exists($filePath)) {
	// 		include $filePath;
	// 	}
	// }
}
