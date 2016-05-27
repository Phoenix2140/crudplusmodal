<?php 
	require('conexion.php');
	$db = new Conexion();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CREAR CONTACTO</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>CREAR CONTACTO</h3>
		</div>
		<div class="row">
			<div>
				<a href="index.php" class="btn btn-success">Volver a la lista</a>
				<br>
				<br>
				<!-- Inicio Formulario -->
				<!-- Utilizamos el método POST -->
				<!-- El atributo action hace referencia al script
				que permite el nuevo contacto (crear-usuario.php) -->
				<form action="crear-usuario.php" role="form" method="POST">
					<!-- INPUT RUT -->
					<div class="form-group">
						<label for="in-rut">
							Ingrese rut:
						</label>
						<input type="text" name="in-rut" class="form-control">
					</div>
					<!-- INPUT NOMBRE -->
					<div class="form-group">
						<label for="in-nombre">
							Ingrese Nombre:
						</label>
						<input type="text" name="in-nombre" class="form-control">
					</div>
					<!-- SELECT CARGO -->
					<div class="form-group">
						<label for="cargo">
							Cargo:
						</label>
						<select name="cargo" id="cargo" class="form-control" required="required">
							<?php 
							$query = $db->query("SELECT * FROM CARGOS;");
							foreach ($query as $cargo) {
								echo "<option value=\"".$cargo["id_cargo"]."\">".$cargo["nombre"]."</option>";
							}
							 ?>
						</select>
					</div>
					<!-- INPUT EMAIL -->
					<div class="form-group">
						<label for="in-mail">
							Ingrese e-mail:
						</label>
						<input type="text" name="in-mail" class="form-control">
					</div>
					<!-- INPUT TELÉFONO -->
					<div class="form-group">
						<label for="in-telefono">
							Ingrese teléfono:
						</label>
						<input type="text" name="in-telefono" class="form-control">
					</div>
					<!-- SUBMIT -->
					<button class="btn btn-default">
						CREAR
					</button>
				</form> <!-- fin formulario -->
			</div>
		</div>
	</div> <!-- container -->
	
</body>
</html>