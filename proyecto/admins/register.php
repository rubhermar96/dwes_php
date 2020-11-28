<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Sign up</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<!--Navegador-->
	<nav>
    	<div class="inicio">
        	<a href="../index.php"><span><i class="material-icons">home</i>Inicio</span></a>
    	</div>
	</nav>
  	<div class="header">
  		<h2>Registro Trabajador</h2>
  	</div>
	<!--Formulario Registro-->
  	<form method="post" action="register.php">
  		<?php include('errors.php'); ?>
  		<div class="input-group">
  	  		<label>Usuario</label>
  	  		<input type="text" name="usernameTrabajador" required>
  		</div>
		<div class="input-group">
  	  		<label>Nombre</label>
  	  		<input type="text" name="nombreTrabajador" required pattern="^[a-zA-Z\s]+$" title="Nombre incorrecto">
  		</div>
		  <div class="input-group">
  	  		<label>Apellidos</label>
  	  		<input type="text" name="apellidosTrabajador" required pattern="^[a-zA-Z\s]+$" title="Apellidos incorrectos">
  		</div>
  		<div class="input-group">
  	  		<label>Password</label>
  	  		<input type="password" name="passwordTrabajador" required>
  		</div>
  		<div class="input-group">
  	  		<button type="submit" class="btn" name="reg_user">Registrar</button>
  		</div>
  	</form>
  	<footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>