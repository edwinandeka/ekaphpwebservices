<?php 

class Categoria {
	
	//primary key autoincrementada
    public $id;


    public $nombre;
    public $cantidad;

    //asociacion de uno a uno
    //asociacion de muchos a uno

    //asociocion con la clase perfil
    // una categoria pertenece a un perfil
    public $perfil;
}
?>