<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PHP CRUD</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>LISTA DE USUARIOS</h3>
			<a href="vista-crear-usuario.php" class="btn btn-success">Crear contacto</a>
		</div>
		<div class="row">
			<!-- TABLA -->
			<table class="table table-striped table-bordered">
				<!-- Cabeza Tabla -->
				<thead>
					<tr>
						<th>Rut</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Teléfono</th>
						<th>Cargo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<!-- Cuerpo Tabla -->
				<tbody>
					<?php 
						// Requerimos archivo conexion.php
						require('conexion.php');
						//Instanciamos la clase conexión
						$db = new Conexion();
						//Instrucción SQl que permite rescatar todos los datos de la tabla de contactos
						$sql = $db->query("SELECT * FROM `CONTACTOS`");
						//Obtenemos el número de filas del conjunto seleccionado
						$nfilas = $db->rows($sql);
						//Si la cantidad de filas es mayor a cero, podemos proceder
						if ($nfilas > 0) {
							for ($i=0; $i < $nfilas; $i++) { 
								//Obtenemos fila de formato arreglo
								$datos = $db->recorrer($sql);
								//Imprimimos los datos obtenidos
								echo '<tr>';
								echo '<td>'. $datos['rut'].'</td>';
								echo '<td>'. $datos['nombre'].'</td>';
								echo '<td>'. $datos['email'].'</td>';
								echo '<td>'. $datos['telefono'].'</td>';
								echo '<td>';
								$query = $db->query("SELECT * FROM CARGOS WHERE id_cargo='".$datos["id_cargo"]."';");
								foreach ($query as $cargo) {
									if ($cargo["id_cargo"] == $datos["id_cargo"]) {
										echo $cargo["nombre"];
									}else{
										echo "hola";
									}
								}
								echo '</td>';
								echo "<td><div class=\"btn-group\" role=\"group\"><a class=\"btn btn-info\" data-toggle=\"modal\" href=\"#ed_".$datos['rut']."\">Editar</a>";
								echo "<a class=\"btn btn-danger\" data-toggle=\"modal\" href=\"#el_".$datos['rut']."\">Eliminar</a></div></td>";
								echo '</tr>';
							}
						}
					 ?>
				</tbody>
			</table>
		</div> <!-- table -->
	</div> <!-- container -->
	
	<?php 

						$sql = $db->query("SELECT * FROM `CONTACTOS`");

						$nfilas = $db->rows($sql);

						if ($nfilas > 0) {
							for ($i=0; $i < $nfilas; $i++) { 
								$datos = $db->recorrer($sql);
								echo "<div class=\"modal fade\" id=\"ed_".$datos["rut"]."\">
										<div class=\"modal-dialog\">
											<div class=\"modal-content\">
												<div class=\"modal-header\">
													<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
													<h4 class=\"modal-title\">Editar Usuario</h4>
												</div>
												<div class=\"modal-body\">
												<form action=\"editar-usuario.php\" role=\"form\" method=\"POST\">
													<input type=\"hidden\" name=\"ed-rut\" value=\"".$datos["rut"]."\">
													<div class=\"form-group\">
														<label for=\"exampleInputEmail1\">
															Ingrese rut:
														</label>
														<input type=\"text\" name=\"in-rut\" class=\"form-control\" value=\"".$datos["rut"]."\">
													</div>
													<div class=\"form-group\">
														<label for=\"exampleInputEmail1\">
															Ingrese Nombre:
														</label>
														<input type=\"text\" name=\"in-nombre\" class=\"form-control\" value=\"".$datos["nombre"]."\">
													</div>";
								echo "				<div class=\"form-group\">
														<label for=\"exampleInputEmail1\">
															Cargo:
														</label>
														<select name=\"cargo\" id=\"cargo\" class=\"form-control\" required=\"required\">";
														$query = $db->query("SELECT * FROM CARGOS;");
														foreach ($query as $cargo) {
															if ($cargo["id_cargo"] == $datos["id_cargo"]) {
																echo "<option value=\"".$cargo["id_cargo"]."\" selected=\"selected\">".$cargo["nombre"]."</option>";
															}else{
																echo "<option value=\"".$cargo["id_cargo"]."\">".$cargo["nombre"]."</option>";
															}
														}
															
								echo "						</select>
													</div>";
								echo "				<div class=\"form-group\">
														<label for=\"exampleInputEmail1\">
															Ingrese e-mail:
														</label>
														<input type=\"text\" name=\"in-mail\" class=\"form-control\" value=\"".$datos["email"]."\">
													</div>
													<div class=\"form-group\">
														<label for=\"exampleInputEmail1\">
															Ingrese teléfono:
														</label>
														<input type=\"text\" name=\"in-telefono\" class=\"form-control\" value=\"".$datos["telefono"]."\">
													</div>
												</div>
												<div class=\"modal-footer\">
													<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
													<button type=\"submit\" class=\"btn btn-primary\">Editar</button>
												</div>
												</form> 
											</div>
										</div>
									</div>";

								echo "<div class=\"modal fade\" id=\"el_".$datos["rut"]."\">
										<div class=\"modal-dialog\">
											<div class=\"modal-content\">
												<div class=\"modal-header\">
													<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
													<h4 class=\"modal-title\">Eliminar Usuario</h4>
												</div>
												<div class=\"modal-body\">
													<form action=\"eliminar-usuario.php\" method=\"POST\">
														<p>¿Realmente desea eliminar el usuario <b>".$datos["nombre"]."</b>?</p>
														<input type=\"hidden\" name=\"del-rut\" value=\"".$datos["rut"]."\">
												</div>
												<div class=\"modal-footer\">
													<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
													<button type=\"submit\" class=\"btn btn-danger\">Eliminar</button>
												</div>
													</form>
											</div>
										</div>
									</div>";
							}
						}
	?>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>