<?php

/**
 * @file  : class Login_webservice
 *
 * @autor : edwin_eka
 * @email  : edwinandeka@gmail.com
 *
 * version 1.0
 *
 * fecha: 18 abril de 2014
 *
 */

class Login_webservice {

	function login() {

		$login = Post::input("login");

		if ($login['email']=="eka")
			if ($login['password']=="79ee82b17dfb837b1be94a6827fa395a") {
				$data = array();
				$data['status'] = true;
				$data['url'] = '/tuluaventas-admin/views/index/index.html';
				echo json_encode($data);
			}else {
				echo "password incorrecto";
			}
		else 
			echo "el email no se encuentra registrado";
			
	}

	public function pruebas()
	{
		
		$perfil = new Perfil();
		$perfil->name = "Gerente";
		Model::save($perfil);


		$categoria = new Categoria();
		$categoria->nombre = "muebles";
		$categoria->perfil = $perfil;
		Model::save($categoria);

		$categoria = new Categoria();
		$categoria->nombre = "carros";
		$categoria->perfil = $perfil;
		Model::save($categoria);

		$categoria = new Categoria();
		$categoria->nombre = "casas";
		$categoria->perfil = $perfil;
		Model::save($categoria);

		echo json_encode($perfil -> getCategorias());

	}


}
?>