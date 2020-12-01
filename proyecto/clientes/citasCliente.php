<?php include('server.php');
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Mis Citas</title>
</head>
<body>
    <nav>
    	<div class="inicio">
        	<a href="index.php?logout='1'"><span><i class="material-icons">home</i>Inicio / Cerrar Sesión</span></a>
      </div>
      <div class="perfil">
            <a class="btnPerfil" href="perfilCliente.php"><?php echo $_SESSION['username'] ?></a>
      </div>
    </nav>
    <div class="nav2">
      <button class="btn2"><a href="inicioCliente.php" style="color: white; text-decoration: none;">Nueva Cita</a></button>
      <button class="btn3"><a href="citasCliente.php" style="color: white; text-decoration: none;">Mis Citas</a></button>
    </div>
    <div class="titlePage">
      <h2>Mis Citas</h2>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>