<?php

/*
 * @file  : class Model
 *
 * @autor : edwin_eka
 * @emal  : edwinandeka@gmail.com
 *
 * version 1.0
 *
 * fecha: 02 de enero de 2014
 *
 */

class Model {

	function __construct() {
	}

	public static function create($model, $id = "") {

		$post = Post::input($model);

		$model = ucfirst(strtolower($model));
		$vars_clase = get_class_vars($model);

		$model = new $model;

		$i = 0;

		foreach ($vars_clase as $attr => $value) {
			if ($i > 0) 
				if (isset($post[$attr])) 
					$model -> $attr = $post[$attr];
			$i++;
		}

		if ($id != "") 
			$model -> id = $id;
		

		return $model;
	}

	/**
	 * recibe un objeto de modelo y lo guarda en la base de datos
	 */
	public static function save($model) {

		$vars_clase = get_class_vars(get_class($model));

		$table = get_class($model);
		$table = strtolower($table);
		$sql = "INSERT INTO $table (";

		$i = 0;
		foreach ($vars_clase as $attr => $value) {
			$sql .= "`$attr`";

			if ($i < count($vars_clase) - 1) 
				$sql .= ", ";
			$i++;
		}

		$sql .= ") VALUES  (";

		$i = 0;
		foreach ($vars_clase as $attr => $value) {
			if ($i == 0) 
				$sql .= "NULL,";

			if ($i > 0) {
				if (is_int($model -> $attr)) 
					$sql .= $model -> $attr;
				else if(gettype($model -> $attr)=="object")
					$sql .= $model -> $attr -> id ;
				else
					$sql .= "'" . $model -> $attr . "'";
				
				if ($i < count($vars_clase) - 1) 
					$sql .= ", ";
			}
			$i++;

		}
		$sql .= ")";
		//echo $sql;

		$_database = Database::getIntance();

		if ($_database -> exec($sql) !== false) {
			$model -> id = $_database -> lastInsertId();
			return true;
		} else {
			return false;
		}

	}

	/**
	 * recibe un objeto de modelo y lo edita en la base de datos
	 */
	public static function update($model) {

		$vars_clase = get_class_vars(get_class($model));

		$table = get_class($model);
		$table = strtolower($table);
		$sql = "update $table set ";

		$i = 0;
		foreach ($vars_clase as $attr => $value) {

			if ($i > 0) {

				if (is_int($model -> $attr)) {
					$sql .= "$attr = $model -> $attr";
				} else {
					$sql .= "$attr ='" . $model -> $attr . "'";
				}

				if ($i < count($vars_clase) - 1) {

					$sql .= ", ";
				}
			}
			$i++;
		}

		$sql .= " where id= " . $model -> id;

		$_database = Database::getIntance();

		if ($_database -> exec($sql) != false) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * recibe un objeto de modelo y lo borra en la base de datos
	 */
	public static function delete($model) {

		$vars_clase = get_class_vars(get_class($model));

		$table = get_class($model);
		$table = strtolower($table);

		$sql = "delete FROM  $table  where id= " . $model -> id;

		$_database = Database::getIntance();

		if ($_database -> exec($sql) !== false) {
			return true;
		} else {
			return false;
		}

	}

}
?>