<?php 
	require_once __DIR__.'/Aplicacion.php';
	

	ini_set('default_charset', 'UTF-8');
	setLocale(LC_ALL, 'es_ES.UTF.8');
	date_default_timezone_set('Europe/Madrid');

	if(!isset($_SESSION)) 
    { 
	/**
	 * Parámetros de conexión a la BD
	 */
		define('BD_HOST', 'localhost');
		define('BD_NAME', 'browserFingerprinting');
		define('BD_USER', 'admin');
		define('BD_PASS', 'admin');
		session_start();
	}	

	// Inicializa la aplicación
	$app = Aplicacion::getSingleton();
	$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

?>