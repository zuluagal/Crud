<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DB02</title>
		<!-- BTS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- CSS -->
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<header>
			<h1>CRUD DB 02</h1>
		</header>
		<div class="container container-fluid">
			<div class="row">
				<div class="col-sm-6 col-md-5 col-lg-6 container-fluid">
					<form action="" method="post" class="form">
						<h2>Lista</h2>
						<input type="submit" name="listar" value="Listar" class="btn btn-success">
						<a href="index.php"><input type="button" value="Inicio" class="btn btn-primary"></a>
						<a href="DB03.php"><input type="button" value="Pag .3" class="btn btn-primary"></a>
					</form>
					<?php
					if(isset($_POST["listar"])){
						$link     = new mysqli('localhost','zul','12345678','test2022_01');
						//
						$sql      = 'SELECT * FROM persona';
						$result   = $link->query($sql);
						while ($fil = $result->fetch_assoc()){
										
					?>
					<br>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Nombre</th>
								<th scope="col">Sexo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row"><?php echo $fil['id'];	?></th>
								<td><?php echo $fil['nombre'];	?></td>
								<td><?php echo $fil['sexo'];	?></td>
							</tr>
						</tbody>
					</table>
					<?php
					}if (mysqli_num_rows($result) == 0) {
					echo"<p style='text-align: center; font-size: 20px; color: #dc3545;'>No se han encontrado datos.</p>".$link->error;
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