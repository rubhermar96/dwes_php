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
    <title>Admin Trabajadores</title>
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
      <h2>Administración Trabajadores</h2>
      <form method="post" action="adminTrabajadores.php" class="formPerfil2">
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
          <!--<button type="submit" class="btn2" name="mod_tra_Admin">Modificar</button>-->
          <button class="btn2"><a href="register.php" style="color: white; text-decoration: none;">Nuevo Administrador</a></button>
          <button type="submit" class="btn4" name="del_tra_Admin" onclick="el()">Eliminar Administrador</button>
        </div>
        <table>
          <tbody>
            <tr><td>ID Usuario</td><td>Usuario</td><td>Nombre</td><td>Apellidos</td><!--<td>Contraseña</td>--></tr>
            <?php
            $queryTrabajador = "SELECT * FROM trabajador";
            $resultsTrabajador = mysqli_query($_SESSION['db'],$queryTrabajador);

            while($datosTrabajador = mysqli_fetch_array($resultsTrabajador)){
              if($datosTrabajador[0]!=1){
              echo '<tr><td><input type="text" name="idTrabajador['.$datosTrabajador[0].']" value="'.$datosTrabajador[0].'" disabled>
              </td><td><input type="text" name="usernameTrabajador['.$datosTrabajador[0].']" value="'.$datosTrabajador[2].'" disabled>
              </td><td><input type="text" name="nombreTrabajador['.$datosTrabajador[0].']" value="'.$datosTrabajador[1].'" disabled>
              </td><td><input type="text" name="apellidosTrabajador['.$datosTrabajador[0].']" value="'.$datosTrabajador[4].'" disabled>
              <td align=center> <input type=checkbox id="check" name="borra['.$datosTrabajador[0].']" value="Si"></td></tr>';
              }
            }
            /*</td><td><input type="password" name="passwordTrabajador['.$datosTrabajador[0].']"></td>*/
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
