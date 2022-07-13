<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DB03</title>
		<!-- BTS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- CSS -->
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body>
		<header>
			<h1>CRUD DB 03</h1>
		</header>
		<div class="container container-fluid">
			<div class="row">
				<div class="col-sm-6 col-md-5 col-lg-6 container-fluid">
					<form action="" method="post" class="form">
						<h2>Buscar por ID</h2>
						<input type="text" name='id' class="form-control" placeholder="Escribe el ID" required>
						<input type="submit" name="buscar" value="Buscar" class="btn btn-info">
						<a href="index.php"><input type="button" value="Inicio" class="btn btn-primary"></a>
						<a href="DB02.php"><input type="button" value="Pag .2" class="btn btn-primary"></a>
					</form>
					<?PHP
						if(isset($_POST['buscar'])){
							$link   = new mysqli('localhost','zul','12345678','test2022_01');
							//$link = new mysqli('localhost','uleonarnsx_zul','xMadara123z','uleonarnsx_crudbd');
							$id     = $_POST['id'];
							$sql    = "SELECT * FROM persona WHERE id = '$id'";
									$result = $link->query($sql);
							if($fil = $result->fetch_assoc()){
							
					?>
					<br>
					<form action="" method="post" class="form">
						<h2>Modificar Datos</h2>
						<label>Id</label>
						<input type="text" name="id" class="form-control" value="<?php echo $fil['id']?>" readonly>
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control"  value="<?php echo $fil['nombre']?>" required><br>
						<label>Sexo</label>
						<input type="text" name="sexo" class="form-control"   value="<?php echo $fil['sexo']?>" required><br>
						<br>
						<input type="submit" name="modificar" value="Modificar" class="btn btn-success">
						<input type="submit" name="eliminar" value="Eliminar" class="btn btn-danger">
					</form>
					<?php
					}else{
					echo "<p style='text-align: center; font-size: 20px; color: #dc3545;'>El id <strong>'".$id."'</strong> no existe.</p>".$link->error;
					}
					mysqli_close($link);
					}else{
					if(isset($_POST['modificar'])){
					$link = new mysqli('localhost','zul','12345678','test2022_01');
					//$link = new mysqli('localhost','uleonarnsx_zul','xMadara123z','uleonarnsx_crudbd');
					$id     = $_POST['id'];
					$nombre = $_POST['nombre'];
					$sexo    = $_POST['sexo'];
					//$id = $_POST['id'];
					$sql = "UPDATE persona SET nombre='$nombre', sexo='$sexo' WHERE id = '$id'";
					$result = $link->query($sql);
					if($result==true){
									echo "<p style='text-align: center; font-size: 20px; color: #198754;'>Usuario actualizado exitosamente.</p>";
								}else{
									echo"<p style='text-align: center; font-size: 20px; color: #dc3545;'>Error al actualizar el usuario.</p>".$link->error;
								}
								mysqli_close($link);
					}else{
						if(isset($_POST['eliminar'])){
					$link = new mysqli('localhost','zul','12345678','test2022_01');
					//$link = new mysqli('localhost','uleonarnsx_zul','Madara123z','uleonarnsx_crudbd');
					$id     = $_POST['id'];
					$nombre = $_POST['nombre'];
					$sexo    = $_POST['sexo'];
					$sql = "DELETE FROM persona WHERE id = '$id'";
							$result = $link->query($sql);
							if($result==true){
									echo "<p style='text-align: center; font-size: 20px; color: #198754;'>Usuario eliminado exitosamente.</p>";
								}else{
									echo"<p style='text-align: center; font-size: 20px; color: #dc3545;'>Error al eliminar el usuario.</p>".$link->error;
								}
					mysqli_close($link);
					}
					}
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