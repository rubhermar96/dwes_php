<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Sign in</title>
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
  		<h2>Inicio Trabajador</h2>
	  </div>
	  <!--Formulario Inicio Sesion-->
  	<form method="post" action="login.php">
  		<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Nombre Usuario</label>
  		<input type="text" name="username" required>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Iniciar Sesión</button>
  	</div>
  	</form>
  	<footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>