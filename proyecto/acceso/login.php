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
        	<a href="index.php"><span><i class="material-icons">home</i>Inicio</span></a>
    	</div>
	</nav>
  	<div class="header">
  		<h2>Iniciar Sesión</h2>
  	</div>
  	<form method="post" action="login.php">
  		<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Nombre Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Entrar</button>
  	</div>
  	<p>¿No eres Cliente? <a href="register.php">Regístrate</a></p>
  	</form>
  	<footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>