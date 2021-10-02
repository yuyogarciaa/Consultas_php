<?php 
$servidor="localhost";
$usuario="root";
$password="";
$db="northwind";
$connection = new mysqli($servidor, $usuario, $password,$db);
if($connection->connect_errno) {
	echo ("Problemas de conex&#243;n con la base de datos");
	exit();
}
if (!$connection->set_charset("utf8")) {
	printf("Error al cargar el conjunto de carecteres utf8: %s\n",
		$connection->error);
	exit();
}
?>