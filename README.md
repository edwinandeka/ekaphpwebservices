# ekaphpwebservices
Framework para el desarrollo de aplicaciones web, back-end y facilitar el acceso a los datos de Mysql sin tener que pensar tanto en SQL

#### Este proyecto fue escrito en php para comodidad de la puesta en produción. 

Carga este proyecto en tu servidor apache 

## Servicios web

Para crear y consumir servvicios web basta con lo siguiente, creamos un archivo con el nombre de nuestro grupo de micreservicios ejemplo ´users_webservice.php´ en el directorio ´webservices´ de este proyecto


```php

<?php 

class Users_webservice {
   function getAll() {
      $array = array();
      $array["users"] = Query::all("user");
      echo json_encode($array);
   }
}

?>

```


## Modelos y Mysql
Configura tus credenciales de la base de datos de mysql en el directorio `core/config` en el archivo `Database.php` una vez configurado
puedes crear tus modelos como en tus tablas ejemplo:

###### Tabla user

| id        | name           | phone  |
| ------------- |:-------------:| -----:|
| 1      | Carlos Murcia |55555 |
| 2      | Felipe  Herrera    |   777777 |


##### user.php

Crea el archivo´user.php´ en el directorio ´models´ de este proyecto

```php

<?php 

class User {
   //primary key autoincrementada
   public $id;

   public $name;
   public $phone;
}

?>

```

Entonces podras cambiar esos aburridos querys por objetos php asi:

```php

<?php 

$userFelipe = Query::byId('user', 2);

echo "Nombre: $userFelipe->name  Teléfono: $userFelipe->phone";

?>

```













