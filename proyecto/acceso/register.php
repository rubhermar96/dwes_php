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
        	<a href="index.php"><span><i class="material-icons">home</i>Inicio</span></a>
    	</div>
	</nav>
  	<div class="header">
  		<h2>Registrarse</h2>
  	</div>
	
  	<form method="post" action="register.php">
  		<?php include('errors.php'); ?>
  		<div class="input-group">
  	  		<label>Nombre Usuario</label>
  	  		<input type="text" name="username" value="<?php echo $username; ?>">
  		</div>
  		<div class="input-group">
  	  		<label>Email</label>
  	  		<input type="email" name="email" value="<?php echo $email; ?>">
  		</div>
  		<div class="input-group">
  	  		<label>Password</label>
  	  		<input type="password" name="password_1">
  		</div>
  		<div class="input-group">
  	  		<label>Confirmar Password</label>
  	  		<input type="password" name="password_2">
  		</div>
  		<div class="input-group">
  	  		<button type="submit" class="btn" name="reg_user">Registrar</button>
  		</div>
  		<p>¿Ya eres Cliente? <a href="login.php">Inicia Sesion</a></p>
  	</form>
  	<footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>