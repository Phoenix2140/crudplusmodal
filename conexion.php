<?php 
	/*
	*Clase que permite conectarnos a la Base de datos
	*/
	//Clase Conexion extiende de la clase mysqli
	Class Conexion extends mysqli{
		// Contructor de la clase
		public function __construct() {
			//Requerimos el constructor de la clase padre
			/*
			*Enviamos por parametros la dirección del servidor,
			*nombre de usuario, contraseña y nombre de la base de datos
			*/
			parent::__construct('localhost', 'root', 'phnx', 'DB_CONTACTOS');
			//Indicamos la codificación de carácteres que vamos a utilizar
			$this->query("SET NAMES 'utf8';");
			//Verificamos el estado de la conexión
			$this->connect_errno ? die('Error en la base de datos') : $x = 'conectado!';
			//echo $x;
			//Destruimos la variable $x
			unset($x);
		}

		/*
		*Creammos la función "recorrer" que nos va a permitir
		*recorrer la base de datos y obtener las filas de los resultados
		*como un array asociativo
		*/
		public function recorrer($y){
			return mysqli_fetch_array($y);
		}

		public function rows($y){
			return mysqli_num_rows($y);
		}
	}
 ?>