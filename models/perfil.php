<?php 

class Perfil {
	//primary key autoincrementada
    public $id;

    public $name;
    public $create;
	public $update;
	public $read;
	public $delete;
    
    //asociacion de uno a muchos
    //un perfil tiene muchas categorias
    // @use: $categorias = $objetoPerfil->getCategorias();
    // return array de objetos Categoria con la información de la base de datos
    public function getCategorias(){
    	return Query::byColumnAll("categoria","perfil", $this->id);
    }
}
?>