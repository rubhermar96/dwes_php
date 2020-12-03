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
    <title>Admin Servicios</title>
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
      <h2>Administración Servicios</h2>
      <form method="post" action="adminTrabajadores.php" class="formPerfil2" id="regSer">
        <h2>Nuevo Servicio</h2>
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
        <?php include('errors.php'); ?>
        <div class="input-group">
  	  		<label>Nombre Servicio</label>
  	  		<input type="text" name="nombreServicio" required>
        </div>
        <div class="input-group">
  	  		<label>Precio Servicio</label>
  	  		<input type="text" name="costeServicio" required title="Precio incorrecto">
        </div>
        <div class="input-group">
          <label>Tipo</label>
          <select name="tipoServicio">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
            <option value="N">Niño/a</option>
          </select>
        </div>
        <div class="input-group">
  	  		<button type="submit" class="btn" name="reg_service">Añadir Servicio</button>
  		</div>
      </form>
      <form method="post" action="adminTrabajadores.php" class="formPerfil2">
        <div class="input-group">
          <!--<button type="submit" class="btn2" name="mod_tra_Admin">Modificar</button>-->
          <button type="submit" class="btn4" name="del_ser_Admin" onclick="el()">Eliminar Servicio</button>
        </div>
        <table>
          <tbody>
            <tr><td>ID Servicio</td><td>Nombre Servicio</td><td>Precio Servicio</td><td>Tipo Servicio</td><!--<td>Contraseña</td>--></tr>
            <?php
            $queryServicio = "SELECT * FROM servicio";
            $resultsServicio = mysqli_query($_SESSION['db'],$queryServicio);

            while($datosServicio = mysqli_fetch_array($resultsServicio)){
              echo '<tr><td><input type="text" name="idServicio['.$datosServicio[0].']" value="'.$datosServicio[0].'" disabled>
              </td><td><input type="text" name="nombreServicio['.$datosServicio[0].']" value="'.$datosServicio[1].'">
              </td><td><input type="text" name="costeServicio['.$datosServicio[0].']" value="'.$datosServicio[2].'">
              </td><td><input type="text" name="tipoServicio['.$datosServicio[0].']"  pattern="^[a-zA-Z\s]+$" title="Apellidos incorrectos" value="'.$datosServicio[3].'">
              <td align=center> <input type=checkbox id="check" name="borra['.$datosServicio[0].']" value="Si"></td></tr>';
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
        alert("Servicios Eliminados");
      }
    </script>
</body>
</html>