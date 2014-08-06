<?php
/**
 *
 */
class Database extends PDO {

	function __construct() {
		parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHARSET));
	}

	/**
	 * retorna una unica instancia de la clase Database
	 *
	 */
	public static function getIntance() {

		$_database;

		if (isset($_database)) {
			return $_database;
		} else {
			$_database = new Database;

			return $_database;
		}

	}

}
?>