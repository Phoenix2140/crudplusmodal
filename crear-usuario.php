<?php 
	/* Script que captura datos recibidos por POST y los guarda en una DB*/

	// Requerimos la clase conexión 
	require('conexion.php');

	//Iniciamos la clase
	$db = new Conexion();

	//Capturamos los datos via POST
	$rut = $_POST["in-rut"];
	$nombre = $_POST["in-nombre"];
	$cargo = $_POST["cargo"];
	$email = $_POST["in-mail"];
	$telefono = $_POST["in-telefono"];

	/* 
	*Enviamos la instrucción SQL que permite ingresar 
    *los datos a la BD en la tabla contactos 
    */
    $db->query("INSERT INTO CONTACTOS VALUES ('$rut', '$nombre', '$email', '$telefono', '$cargo');");

    //Regreamos al index
    header("Location: index.php");
 ?>