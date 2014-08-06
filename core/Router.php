<?php

/*
 * @file  : class Router
 *
 * @autor : edwin_eka
 * @email  : edwinandeka@gmail.com
 *
 * version 1.0
 *
 * fecha: 19 de abril de 2014
 *
 * 
 */

class Router {

	/**
	* 
	*  @description se encarga de redirigir la ruta al webservice y action indicada por la url
	*
	*	@params $url, es la ruta /webservice/action/params se pueden pasar varios params 
	*				 así : ruta /webservice/action/params/params/params/params/params/params/.... 			
	*/
	public static function init($url) {
		$request = new Request($url);

		$webservice = $request -> getWebService() . "_webservice";
		$routewebservice = WEB_SERVICE_PATH . $webservice . ".php";

		//verifica si existe el webservice
		if (is_readable($routewebservice)) {
			//incluimos el webservice solicitado
			require_once $routewebservice;
			
			//convertimos a nombre de  una clase
			$webservice = ucfirst(strtolower($webservice));

			//verifica si existe la clase para el webservice
			if (class_exists($webservice)) {
				$action = $request -> getAction();
				$params = $request -> getParams();
				
				$objetWebService = new $webservice;
				//se verifica si la action a sido declarada en el webservice
				if (is_callable(array($objetWebService, $action))) 
					if (isset($params)) 
						call_user_func_array(array($objetWebService, $action), $params);
					else 
						call_user_func(array($objetWebService, $action));
				else
					echo "ERROR: action no found>>> " . $action . "in class >>> " + $webservice;

			} else 
				echo "ERROR: class no found >>> " . $webservice . " extend WebService{...} <br/>" . "in file >>> " . $routewebservice ;
		} else 
			echo "ERROR: webservice no found >>> " . $routewebservice . "<br/>" . "in route >>> " . WEB_SERVICE_PATH;
	
	}
}
?>