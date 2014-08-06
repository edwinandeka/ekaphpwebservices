<?php
/*
 * @file  : class Request
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


class Request {

	private $_webservice;
	private $_action;
	private $_params;

	function __construct($url) {
		$url = explode("/", $url);
		$url = array_filter($url);

		$this -> _webservice = array_shift($url);
		$this -> _action = array_shift($url);
		$this -> _params = $url;

		if (!$this -> _action) 
			$this -> _action = "index";
		
		if (!isset($this -> _params)) 
			$this -> _params = array();
	}

	public function getWebService() {
		return $this -> _webservice;
	}

	public function getAction() {
		return $this -> _action;
	}

	public function getParams() {
		return $this -> _params;
	}

}
?>