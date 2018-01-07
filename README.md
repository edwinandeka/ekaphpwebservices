# EKA php webservices
Framework para el desarrollo de microservicios web, back-end y facilitar el acceso a los datos de Mysql sin tener que pensar tanto en SQL

#### Este proyecto fue escrito en php para comodidad de el desarrollador que usa el framework y la facilidad de este lenguaje en la puesta en produción. 

Carga este proyecto en tu servidor apache 

## Servicios web

Para crear y consumir servvicios web basta con lo siguiente, creamos un archivo con el nombre de nuestro grupo de micreservicios ejemplo `users_webservice.php` en el directorio `webservices` de este proyecto


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
Para consumir este servicio por ejemplo en JQuery haremos lo siguiente, creamos una petición post hacia el servidor donde tenemos alojado el proyecto en este caso con el nombre de `ekaphpwebservices` tu puedes renombrar este como lo desees
para el ejemplo usaremos la url `http://localhost/ekaphpwebservices/index.php` siempre debemos dirigir la peticion al archivo `index.php` del proyecto, y agregar un parametro por `post` llamado `route` el cual le indica el nombre del paquete de servicios y el microservicio o ejecutar de la sigiente manera.

```javascript

$.post( "http://localhost/ekaphpwebservices/index.php", { route: "users/getAll" })
.done(function( data ) {
   console.log( "Data Loaded usuarios: ", data.users );
});

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

Crea el archivo`user.php` en el directorio `models` de este proyecto

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













