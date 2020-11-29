<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin Clientes</title>
</head>
<body>
    <nav>
    	<div class="inicio">
        	<a href="../index.php?logout='1'"><span><i class="material-icons">home</i>Inicio / Cerrar Sesión</span></a>
          <div class="perfil">
            <a class="btnPerfil" href="perfilAdmin.php"><?php echo $_SESSION['username']?></a>
        </div>
    	</div>
    </nav>
    <div class="nav2">
      <button class="btn3"><a href="inicioAdmins.php" style="color: white; text-decoration: none;">Citas</a></button>
      <button class="btn3"><a href="adminClientes.php" style="color: white; text-decoration: none;">Clientes</a></button>
      <button class="btn3"><a href="adminTrabajadores.php" style="color: white; text-decoration: none;">Trabajadores</a></button>
      <button class="btn3"><a href="adminServicios.php" style="color: white; text-decoration: none;">Servicios</a></button>
    </div>
    <div class="titlePage">
      <h2>Administración Clientes</h2>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>