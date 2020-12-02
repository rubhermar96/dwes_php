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
      <form method="post" action="perfilAdmin.php" class="formPerfil2">
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
        <div class="input-group">
          <button type="submit" class="btn2" name="mod_Cli_Admin">Modificar</button>
          <button type="submit" class="btn4" name="del_Cli_Admin" onclick="el()">Eliminar Cuenta</button>
        </div>
        <table>
          <tbody>
            <tr><td>ID Usuario</td><td>Usuario</td><td>Nombre</td><td>Apellidos</td><td>Email</td><td>DNI</td><td>Teléfono</td><td>Contraseña</td></tr>
            <?php
            $queryClientes = "SELECT * FROM cliente";
            $resultsClientes = mysqli_query($_SESSION['db'],$queryClientes);

            while($datosClientes = mysqli_fetch_array($resultsClientes)){
              echo '<tr><td><input type="text" name="idCliente" value="'.$datosClientes[0].'" disabled>
              </td><td><input type="text" name="usernameCliente" value="'.$datosClientes[6].'">
              </td><td><input type="text" name="nombreCliente" pattern="^[a-zA-Z\s]+$" title="Nombre incorrecto" value="'.$datosClientes[2].'">
              </td><td><input type="text" name="apellidosCliente"  pattern="^[a-zA-Z\s]+$" title="Apellidos incorrectos" value="'.$datosClientes[7].'">
              </td><td><input type="email" name="emailCliente"  title="Email incorrecto" value="'.$datosClientes[4].'">
              </td><td><input type="text" name="dniCliente"  pattern="^\d{8}[A-Z]$" title="DNI incorrecto" value="'.$datosClientes[1].'">
              </td><td><input type="tel" name="tlfnCliente"  pattern="^[6-9][0-9]{8}$" title="Teléfono incorrecto" value="'.$datosClientes[3].'">
              </td><td><input type="password" name="passwordCliente"></td>
              <td align=center> <input type=checkbox id="check" name=borra['.$datosClientes[0].'] value="Si"></td></tr>';
            }
              ?>

          </tbody>
        </table>
      </form>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
    <script>
      function el(){
        alert("Cuenta Eliminada");
      }
    </script>
</body>
</html>