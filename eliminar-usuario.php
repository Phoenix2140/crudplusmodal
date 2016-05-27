<?php 
	require('conexion.php');

	$db = new Conexion();
	$rut = $_POST["del-rut"];

	$db->query("DELETE FROM CONTACTOS WHERE rut='$rut';");

	header("Location: index.php");
 ?>