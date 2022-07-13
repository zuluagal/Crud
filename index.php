<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Inicio</title>
		<!-- BTS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- CSS -->
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<header>
			<h1>CRUD DB 01</h1>
		</header>
		<div class="container container-fluid">
			<div class="row">
				<div class="col-sm-6 col-md-5 col-lg-6 container-fluid">
					<form action="" method="post" class="form">
						<h2>Formulario</h2>
						<input type="text" name="id" placeholder="ID" class="form-control" required>
						<input type="text" name="nombre"  placeholder="Nombre" class="form-control" required>
						<input type="text" name="sexo" placeholder="Sexo" class="form-control" required>
						<div class="botones-frm">
							<a href="#"><input type="submit" value="Guardar" class="btn btn-success"></a>
							<a href="DB02.php"><input type="button" value="Pag .2" class="btn btn-primary"></a>
							<a href="DB03.php"><input type="button" value="Pag .3" class="btn btn-primary"></a>
						</div>
					</form>
					<?php
					if($_POST){
						$link = new mysqli('localhost','zul','12345678','test2022_01');
						//$link = new mysqli('localhost','uleonarnsx_zul','xMadara123z','uleonarnsx_crudbd');
							if ($link->connect_errno) {
								echo "Falló la conexión a MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
							}else{
								$nombre = $_POST['nombre'];
										$id		= $_POST['id'];
									$sexo	= $_POST['sexo'];
								$sql    = "INSERT INTO persona (nombre, id, sexo) ".
									"VALUES ('$nombre', '$id', '$sexo')";
								$result = $link->query($sql);
								if($result==true){
									echo "<p style='text-align: center; font-size: 20px; color: #198754;'>Usuario creado exitosamente.</p>";
								}else{
									echo"<p style='text-align: center; font-size: 20px; color: #dc3545;'>Error al crear el usuario.</p>".$link->error;
								}
							}
						mysqli_close($link);
					}
					?>
				</div>
			</div>
		</div>
		<br>
		<footer class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-lg-12 col-sm-12">
					Leonardo Zuluaga © 2022
				</div>
			</div>
		</footer>
	</body>
</html>