<?php include('server.php');?>
<!DOCTYPE html>
<html lang="en">
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
        	<a href="../index.php?logout='1'"><span><i class="material-icons">home</i>Inicio / Cerrar Sesión</span></a>
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
      <h2>Mi Perfil</h2>
      <form method="post" action="perfilCliente.php" class="formPerfil">
        <table>
          <tbody>
            <tr><td>Usuario</td><td><input type="text" name="username" placeholder="<?php echo $_SESSION['username']?>" disabled></td></tr>
            <tr><td>Nombre</td><td><input type="text" name="nombreCliente" placeholder="<?php echo $_SESSION['nombreCliente']?>"></td></tr>
            <tr><td>Apellidos</td><td><input type="text" name="apellidosCliente" placeholder="<?php echo $_SESSION['apellidosCliente']?>"></td></tr>
            <tr><td>Email</td><td><input type="email" name="emailCliente" placeholder="<?php echo $_SESSION['emailCliente']?>" disabled></td></tr>
            <tr><td>DNI</td><td><input type="text" name="dniCliente" placeholder="<?php echo $_SESSION['dniCliente']?>"></td></tr>
            <tr><td>Teléfono</td><td><input type="tel" name="tlfnCliente" placeholder="<?php echo $_SESSION['tlfnCliente']?>"></td></tr>
            <tr><td>Nueva Contraseña</td><td><input type="password" name="passwordCliente"></td></tr>
          </tbody>
        </table>
      </form>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>