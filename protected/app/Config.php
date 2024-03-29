<?php
// define — Define una constante con nombre.
// Se utiliza para crear una constante
// la cual es global, para luego ser utilizada en cualquier parte de la aplicacion.
//Por esto es que mas adelante se notara la utilizacion de la constante BASE_URL.

	define('DEFAULT_CONTROLLER', 'registro');
	define('DEFAULT_METHOD', 'index');
	
	define('BASE_URL', 'http://localhost/ind/'); //Guarda la direccion BASE de nuestro sistema.
	define('PUBLIC_URL', BASE_URL . 'public/'); //Guarda la direccion de nuestro directorio publico

	define('SIZE_PAPER', 'LEGAL');
	define('SHEET_ORIENTATION', 'P');
	define('LANGUAJE_PDF', 'en');
	define('CHARSET_PDF', 'utf-8');
	
	define('APP_NAME', 'IND');
	define('APP_LOGO', '');
	define('APP_OTHER', '');
	define('SESSION_TIME', 20);
		
	define("DB_HOST", "localhost"); //Servidor con el cual tenemos conexion a BD.
	define("DB_USER", "postgres"); // Usuario de la BD
	define("DB_PASS", "1234"); // Clave
	define("DB_NAME", "ind"); // Nombre de la base de datos.

?>
