<?php

	spl_autoload_register('__autoload');

	function __autoload($class)
	{
		$path = explode('_', $class);

		foreach ($path as $key => $val) {
			$path[$key] = strtolower($val);
		}
		
		if ($path[count($path)-1] == 'model' && count($path) > 1) {
			require_once 'inc/models/class.' . implode('_', $path) . '.inc.php';
		} else if ($path[count($path)-1] == 'controller' && count($path) > 1) {
			require_once 'inc/controllers/class.' . implode('_', $path) . '.inc.php';
		} else {
			if (file_exists('inc/classes/class.' . implode('_', $path) . '.inc.php')) {
				require_once 'inc/classes/class.' . implode('_', $path) . '.inc.php';
			} else if (file_exists('core/class.' . implode('_', $path) . '.inc.php') || file_exists('../core/class.' . implode('_', $path) . '.inc.php')) {
				require_once 'class.' . implode('_', $path) . '.inc.php';
			}
		}
	}

?>