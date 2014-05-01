<?php

/**
 * @description : ejemplo de un webservice para un CRUD sobre la tabla categorias
 *
 * @file  : class Categoria_webservice
 *
 * @autor : edwin_eka
 * @email  : edwinandeka@gmail.com
 *
 * version 1.0
 *
 * fecha: 18 abril de 2014
 *
 */
class Categoria_webservice {

	public function index($page) {
		$init = $page - 20; 
		$array = array();
		//echo $init. "  ". $page;
		$array["categorias"] = Query::all("categoria", "order by nombre limit 20 OFFSET $page");

		echo json_encode($array);
	}

	public function create() {
		
		if (Post::isKey("categoria")) 
			echo  json_encode(Model::save(Model::create("categoria")));
		else 
			echo "error data null: " ;
	}

	public function edit($id) {
		if (Post::isKey("categoria")) 
			echo Model::update(Model::create("categoria", $id));
		else 
			echo json_encode(Query::byId("categoria", $id));
	}

	public function erase($id) {
		echo json_encode(Model::delete(Query::byId("categoria", $id)));
	}

}
?>