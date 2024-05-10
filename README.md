# Global Laravel - angular test

# requisitos

* Node.js 20.^ LTS
* PHP 8.2
* Composer 
* MySql

Pasos para iniciar la aplicación

Laravel:
* abrir en la terminal la carpeta donde clonaste el projecto.
* colocar en la terminal "cd backend"
    
    Crear la base de datos
* colocar en la terminal "php artisan migrate"(darle "yes" para que cree la BD en caso de que no exista), en caso de que la base de datos ya exista , colocar "php artisan migrate:fresh"
* si la aplicación no conecta a la base de datos puede que debas modificar el archivo .env con los datos de conexion de tu entorno
* colocar en la terminal "php artisan serve" para que inicie laravel , la direccion seria localhost:8000

Angular:
* abrir en la terminal la carpeta donde clonaste el projecto.
* colocar en la terminal "cd fronted"

* colocar en la terminal "npm install" para instalar las dependencias del projecto
* colocar en la terminal "npm start" para iniciar el projecto, la direccion predeterminada es "localhost:4200"
