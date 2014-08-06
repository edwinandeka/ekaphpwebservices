<?php

function loadCore($class) {
	$file = CORE_PATH . ucfirst(strtolower($class)) . ".php";
	if (file_exists($file)) {
		include_once $file;
	}
}

function loadModels($class) {
	$file = MODELS_PATH . strtolower($class) . ".php";
	if (file_exists($file)) {
		include_once $file;
	}
}

spl_autoload_register('loadCore');
spl_autoload_register('loadModels');

function Response($message)
{
	echo json_encode($message);
}
?>