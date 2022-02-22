# Application example de CodeIgniter 4

Se debe tener instalado composer para poder ejectuar el proyecto
[Composer](https://getcomposer.org/download/)

Instalacion

```php
// primero se debe instalar las dependencias de composer
composer install

// Se debe crear una base de datos, como ejemplo employees
// crear un archivo .env para las configuraciones, en la carpeta raiz
// con las siguentes propiedades
#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------
database.default.hostname = localhost
database.default.database = employees
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =

// Se debe ejecutar las migraciones
php spark migrate

// se debe ejecutar el seeder
php spark db:seed  AuthSeeder

// por ultimo se ejecuta el servidor
php spark serve

```


Los usuarios son:
  -> Administrador melara@gmail.com ---> password: 1234567890
  -> Los usuarios normales son creados por medio de Faker de manera aleatoria, password: 1234567890
  -> Todos he creado por medio de los seeder
