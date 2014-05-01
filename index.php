<?php

if (isset($_POST["route"])) {
	//proporsionada por el sistema operativo
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('CORE_PATH', ROOT . 'core' . DS);
	define('CONFIG_PATH', ROOT . 'config' . DS);
	define('MODELS_PATH', ROOT . 'models' . DS);
	define('WEB_SERVICE_PATH', ROOT . "webservices" . DS);

	require_once CORE_PATH . 'Autoload.php';
	
	//comente la siguinte linea si sus servicios web no requiere una base de datos
	require_once CONFIG_PATH . 'Database.php';

	Router::init($_POST["route"]);

} else 
	echo "ERROR: data 'route' no found in request";

?>