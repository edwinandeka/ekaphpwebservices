<?php

/**
 *
 */
class Post {

	function __construct() {

	}

	public static function input($key) {
		if (isset($_POST[$key])) {
			return $_POST[$key];
		} else {
			return null;
		}
	}

	public static function isKey($key) {
		if (isset($_POST[$key])) {
			return true;
		} else {
			return false;
		}
	}

	public static function delete() {
		$_POST = array();
	}

}
?>