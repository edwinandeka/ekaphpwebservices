# ekaphpwebservices
Framework para el desarrollo de aplicaciones web, back-end 

#### Este proyecto fue escrito en php para comodidad de la puesta en produción. 

Carga este proyecto en tu servidor apache 

Configura tus credenciales de la base de datos de mysql en el directorio `core/config` en el archivo `Database.php` una vez configurado
puedes crear tus modelos como en tus tablas ejemplo:

###### Tabla user

| id        | name           | phone  |
| ------------- |:-------------:| -----:|
| 1      | Carlos |55555 |
| 2      | Felipe      |   777777 |


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
