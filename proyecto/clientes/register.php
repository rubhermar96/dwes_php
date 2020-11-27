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
	<nav>
    	<div class="inicio">
        	<a href="../index.php"><span><i class="material-icons">home</i>Inicio</span></a>
    	</div>
	</nav>
  	<div class="header">
  		<h2>Registro</h2>
  	</div>
	
  	<form method="post" action="register.php">
  		<?php include('errors.php'); ?>
  		<div class="input-group">
  	  		<label>Usuario</label>
  	  		<input type="text" name="usernameCliente" required>
  		</div>
		<div class="input-group">
  	  		<label>Nombre</label>
  	  		<input type="text" name="nombreCliente" required>
  		</div>
		  <div class="input-group">
  	  		<label>Apellidos</label>
  	  		<input type="text" name="apellidosCliente" required>
  		</div>
		<div class="input-group">
  	  		<label>DNI</label>
  	  		<input type="text" name="dniCliente" required>
  		</div>
  		<div class="input-group">
  	  		<label>Email</label>
  	  		<input type="email" name="emailCliente" required>
  		</div>
  		<div class="input-group">
  	  		<label>Password</label>
  	  		<input type="password" name="passwordCliente" required>
  		</div>
  		<div class="input-group">
  	  		<label>Telefono</label>
  	  		<input type="tel" name="tlfnCliente" required>
  		</div>
  		<div class="input-group">
  	  		<button type="submit" class="btn" name="reg_user">Registrarse</button>
  		</div>
  		<p>¿Ya eres Cliente? <a href="login.php">Inicia Sesion</a></p>
  	</form>
  	<footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>