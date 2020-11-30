<?php include('server.php');
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
      <h2>Mi Perfil</h2>
      <form method="post" action="perfilCliente.php" class="formPerfil">
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
            <tr><td>Usuario</td><td><input type="text" name="username" value="<?php echo $_SESSION['username']?>" disabled></td></tr>
            <tr><td>Nombre</td><td><input type="text" name="nombreCliente" value="<?php echo $_SESSION['nombreCliente']?>" pattern="^[a-zA-Z\s]+$" title="Nombre incorrecto"></td></tr>
            <tr><td>Apellidos</td><td><input type="text" name="apellidosCliente" value="<?php echo $_SESSION['apellidosCliente']?>" pattern="^[a-zA-Z\s]+$" title="Apellidos incorrectos"></td></tr>
            <tr><td>Email</td><td><input type="email" name="emailCliente" value="<?php echo $_SESSION['emailCliente']?>" disabled></td></tr>
            <tr><td>DNI</td><td><input type="text" name="dniCliente" value="<?php echo $_SESSION['dniCliente']?>" pattern="^\d{8}[A-Z]$" title="DNI incorrecto"></td></tr>
            <tr><td>Teléfono</td><td><input type="tel" name="tlfnCliente" value="<?php echo $_SESSION['tlfnCliente']?>" pattern="^[6-9][0-9]{8}$" title="Teléfono incorrecto"></td></tr>
            <tr><td>Nueva Contraseña</td><td><input type="password" name="passwordCliente"></td></tr>
          </tbody>
        </table>
        <div class="input-group">
          <button type="submit" class="btn2" name="mod_user">Modificar</button>
          <button type="submit" class="btn4" name="del_user" onclick="el()">Eliminar Cuenta</button>
        </div>
      </form>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
<script>
  function el(){
    alert("Cuenta Eliminada");
  }
</script>
</html>