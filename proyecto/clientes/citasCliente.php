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
      <form method="post" action="citasCliente.php" class="formPerfil2">
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
          <button type="submit" class="btn4" name="del_cita_Cli" onclick="el()">Eliminar Cita</button>
        </div>
        <table>
          <tbody>
            <tr><td>ID Cita</td><td>Fecha Cita</td><td>Hora Cita</td><td>Nombre Trabajador</td></tr>
            <?php
            $queryCitas = "SELECT * FROM cita";
            $resultsCitas = mysqli_query($_SESSION['db'],$queryCitas);

            while($datosCitas = mysqli_fetch_array($resultsCitas)){
              echo '<tr><td><input type="text" name="idCliente['.$datosCitas[0].']" value="'.$datosCitas[0].'" disabled>
              </td><td><input type="text" name="usernameCliente['.$datosCitas[0].']" value="'.$datosCitas[6].'">
              </td><td><input type="text" name="nombreCliente['.$datosCitas[0].']" pattern="^[a-zA-Z\s]+$" title="Nombre incorrecto" value="'.$datosCitas[2].'">
              </td><td><input type="text" name="apellidosCliente['.$datosCitas[0].']"  pattern="^[a-zA-Z\s]+$" title="Apellidos incorrectos" value="'.$datosCitas[7].'">
              </td><td><input type="email" name="emailCliente['.$datosCitas[0].']"  title="Email incorrecto" value="'.$datosCitas[4].'">
              </td><td><input type="text" name="dniCliente['.$datosCitas[0].']"  pattern="^\d{8}[A-Z]$" title="DNI incorrecto" value="'.$datosCitas[1].'">
              </td><td><input type="tel" name="tlfnCliente['.$datosCitas[0].']"  pattern="^[6-9][0-9]{8}$" title="Teléfono incorrecto" value="'.$datosCitas[3].'">
              <td align=center> <input type=checkbox id="check" name="borra['.$datosCitas[0].']" value="Si"></td></tr>';
              /*</td><td><input type="password" name="passwordCliente['.$datosClientes[0].']"></td>*/
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
        alert("Cita Eliminada");
      }
    </script>
</body>
</html>