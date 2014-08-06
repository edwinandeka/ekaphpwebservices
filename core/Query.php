
<?php

/**
 * @class  Query
 *
 * @author : edwin_eka <edwinandeka@gmail.com>
 * @copyright Copyright (c) 2022, EkaSoft 
 * @version 1.0
 *
 * @date: 02 de enero de 2014
 *
 */

class Query {

	function __construct() {
	}

	/**
	 * hace un llamado ala base de datos retorna todos
	 * las tuplas de la tabla indicada por el modelo
	 * como objetos mas accesibles para el usuario
	 *
	 * @param  
	 *
	 *
	 * */
	public static function all($model, $sql = "") {
		/*
		 * hacemos un llamado a la tabla a la base de datos
		 * la tabla debe tener el mismo nombre que el modelo
		 * */

		$_database = Database::getIntance();
		$result = $_database -> query("select * from $model $sql");
		/*
		 * verificamos que el usuario haga un llamado correcto del modelo
		 * con la primera letra en mayuscula para el nombre de la  clase
		 * no habra distinncion entre mayusculas y minusculas
		 * el framework se encarga de hacer la correccion
		 */
		$model = ucfirst(strtolower($model));

		/*
		 * creamos un array de objetos del tipo del modelo solicitado
		 * y lo retornamos al usuario
		 */
		$models = $result -> fetchall(PDO::FETCH_CLASS, $model);

		$vars_clase = get_class_vars($model);

		foreach ($vars_clase as $attr => $value) {
			$class = ucfirst(strtolower( $attr));
			if (class_exists($class)) {
				foreach ($models as $mod ) {
					$id = $mod -> $attr;
					$result = $_database -> query("select * from " . (strtolower( $class) ) . " where id = " . $id);
					$r = $result -> fetchall(PDO::FETCH_CLASS, $class);		
					if (count($r)) {
						$mod -> $attr = $r[0];
					}
					
				}
			} 
		}
		
		return $models;
	}

	/**
	 * hace un llamado ala base de datos retorna una
	 * las tuplas de la tabla indicada por el modelo y el id
	 * como objetos mas accesibles para el usuario
	 *
	 * */
	public static function byId($model, $id, $sql = "") {
		/*
		 * hacemos un llamado a la tabla a la base de datos
		 * la tabla debe tener el mismo nombre que el modelo
		 * */

		$_database = Database::getIntance();
		$result = $_database -> query("select * from $model where id = $id $sql");
		/*
		 * verificamos que el usuario haga un llamado correcto del modelo
		 * con la primera letra en mayuscula para el nombre de la  clase
		 * no habra distinncion entre mayusculas y minusculas
		 * el framework se encarga de hacer la correccion
		 */
		$model = ucfirst(strtolower($model));
		$vars_clase = get_class_vars($model);
		/*
		 * creamos un array de objetos del tipo del modelo solicitado
		 * y lo retornamos al usuario
		 */
		$model = $result -> fetchall(PDO::FETCH_CLASS, $model);

		// creamos un nuevo objeto del modelo para retornarlo
		return $model[0];
	}

	/**
	 * hace un llamado ala base de datos retorna una
	 * las tuplas de la tabla indicada por el modelo y el id
	 * como objetos mas accesibles para el usuario
	 *
	 * */
	public static function byColumn($model, $column, $value, $sql = "") {
		/*
		 * hacemos un llamado a la tabla a la base de datos
		 * la tabla debe tener el mismo nombre que el modelo
		 * */

		$_database = Database::getIntance();
		$sql = "select * from $model where $column = '$value' $sql";
		// echo $sql;
		$result = $_database -> query($sql);
		/*
		 * verificamos que el usuario haga un llamado correcto del modelo
		 * con la primera letra en mayuscula para el nombre de la  clase
		 * no habra distinncion entre mayusculas y minusculas
		 * el framework se encarga de hacer la correccion
		 */
		$model = ucfirst(strtolower($model));
		$vars_clase = get_class_vars($model);
		/*
		 * creamos un array de objetos del tipo del modelo solicitado
		 * y lo retornamos al usuario
		 *
		 *
		 */
		if ($result == null) {
			return false;
		} else {

			$model = $result -> fetchall(PDO::FETCH_CLASS, $model);
			if ($model != array()) {
				return $model[0];
			}

		}

	}

	/**
	 * hace un llamado ala base de datos retorna una
	 * las tuplas de la tabla indicada por el modelo y el id
	 * como objetos mas accesibles para el usuario
	 *
	 * */
	public static function byColumnAll($model, $column, $value, $sql = "") {
		/*
		 * hacemos un llamado a la tabla a la base de datos
		 * la tabla debe tener el mismo nombre que el modelo
		 * */

		$_database = Database::getIntance();
		$sql = "select * from $model where $column = '$value' $sql";

		// echo $sql;
		$result = $_database -> query($sql);
		/*
		 * verificamos que el usuario haga un llamado correcto del modelo
		 * con la primera letra en mayuscula para el nombre de la  clase
		 * no habra distinncion entre mayusculas y minusculas
		 * el framework se encarga de hacer la correccion
		 */
		$model = ucfirst(strtolower($model));
		$vars_clase = get_class_vars($model);
		/*
		 * creamos un array de objetos del tipo del modelo solicitado
		 * y lo retornamos al usuario
		 *
		 *
		 */
		if ($result == null) {
			return true;
		} else {

			$model = $result -> fetchall(PDO::FETCH_CLASS, $model);
			if ($model != array()) {
				return $model;
			}
		}
	}
}
?>