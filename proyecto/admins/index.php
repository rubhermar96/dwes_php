<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Inicia Sesion Primero";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="content">
  	<!-- Noteificacion success -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- Información Usuario -->
    <?php  if (isset($_SESSION['username'])) : ?>
		<p>Hola <strong><?php echo $_SESSION['username']; ?></strong></p>
		<div class="input-group">
  			<button class="btn"><a href="inicioAdmins.php" style="color: white; text-decoration: none;">Continuar</a></button>
  		</div>
    	<p> <a href="index.php?logout='1'" style="color: red;">Cerrar Sesión</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>