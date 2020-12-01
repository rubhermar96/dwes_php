<?php 
include('server.php');
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
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
        	<a href="index.php?logout='1'"><span><i class="material-icons">home</i>Inicio / Cerrar Sesión</span></a>
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
      <form method="post" action="perfilAdmin.php" class="formPerfil">
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
        <table>
          <tbody>
            <tr><td>ID Usuario</td><td>Usuario</td><td>Nombre</td><td>Apellidos</td><td>Email</td><td>DNI</td><td>Teléfono</td><td>Contraseña</td></tr>
            <?php for($i=0;$i<10;$i++){
              echo "<tr><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td><td>a</td></tr>";
            }
              ?>

          </tbody>
        </table>
        <div class="input-group">
          <button type="submit" class="btn2" name="mod_admin">Modificar</button>
          <button type="submit" class="btn4" name="del_admin" onclick="el()">Eliminar Cuenta</button>
        </div>
      </form>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>