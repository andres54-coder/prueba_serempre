# Prueba Serempre

_Este Proyecto tiene como objetivo la presentación de la prueba técnica de Laravel para Serempre_

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

_Ante todo necesitas tener todo lo necesario para instalar este proyecto en una maquina local, en este caso necesitaras el entorno de desarrollo que nos brinda [Laragon](https://laragon.org/docs/index.html)_

_Php 7.4_
_MySql8_
_Apache Server_
_NodeJs_ o _Npm_

### Instalación 🔧

_clona el proyecto_

```
git clone https://github.com/rapster21/prueba_serempre.git
```

_Instala las dependecias necesarias de Composer_

```
composer install
```
_Ejecuta los siguientes comandos_

```
npm install
npm run dev
```
_Ejecuta las migraciones y siembras_ "no olvides configurar tu base de datos en .env"
```
php artisan MigrateDatabase
```
_Crea un enlace simbólico en la aplicación_
```
php artisan storage:link
```
_Genera una llave secreta para la api del proyecto_
```
php artisan jwt:secret
```

_Finaliza con un ejemplo de cómo obtener datos del sistema o como usarlos para una pequeña demo_

## Rutas para las pruebas de api ⚙️
_Puedes utilizar [Postman](https://www.postman.com/) para testear la api_



_Login **POST**_

```
api/login

{//Body -JSON- raw
    "email":"pruebaSerempre@serempre.com",
    "password":"serempre"
}

//Esto devolverá un token que utilizaras para la autenticación al testear las otras rutas
```
_Logout **POST**_

```
api/logout

//necesitas Token
```
_Info user **GET**_

```
api/user/info/{id}

//necesitas Token
```
_Update user **POST**_

```
api/user/update/{id}


{   //Body -JSON- raw
    "name":"nombre",
    "email":"valito7788@gmail.com",
    "password":"serempre2"
}

//necesitas Token
```



## Despliegue 📦

_Sino tienes configurado un virtualHost en tu entorno de desarrollo puedes utilizar:_
```
php artisan serve
```
_Puedes usar este usuario para ingresar a la aplicación_
```
Email: pruebaSerempre@serempre.com
Password: serempre
```

---
## Construido con 🛠️

_Herramientas que utilize para el proyecto_

* [Laravel](https://laravel.com/) - El framework web usado
* [Laravel Excel](https://laravel-excel.com/) - Manejador de importaciones y exportaciones de excel
* [Laravel Jwt](https://jwt-auth.readthedocs.io/en/develop/) - Usado para autenticación JWT apí



## Autores ✒️



**Andrés Felipe Castañeda Malagon** - *Trabajo Inicial* - 





---

