<?php

/**
 *
 */
class Session {

	function __construct() {

	}

	public static function set($key, $value) {

		if (!session_id())
			@ session_start();

		$_SESSION[$key] = $value;

	}

	public static function get($key) {

		if (!session_id())
			@ session_start();

		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return "no existe la key de session: $key";
		}
	}

	public static function valueFor($key) {

		if (!session_id())
			@ session_start();

		if (isset($_SESSION[$key])) {
			return true;
		} else {
			return false;
		}
	}

	public static function delete($key) {

		if (!session_id())
			@ session_start();

		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}
	}

}
?>