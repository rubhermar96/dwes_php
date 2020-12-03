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
            <tr><td>ID Cita</td><td>Fecha Cita</td><td>Hora Cita</td><td>Servicio</td><td>Peluquero</td></tr>
            <?php
            $queryCitas = "SELECT cita.id_cita, cita.fecha_cita, cita.hora_cita, servicio.nombre_servicio, trabajador.nombre_trabajador FROM cita, servicio, trabajador WHERE cita.id_servicio=servicio.id_servicio AND cita.Trabajador_id_trabajador=trabajador.id_trabajador AND cita.id_cliente=".$_SESSION['idCliente']." ORDER BY fecha_cita;";
            $resultsCitas = mysqli_query($_SESSION['db'],$queryCitas);

            while($datosCitas = mysqli_fetch_array($resultsCitas)){
              $fechaCita = new DateTime($datosCitas[1]);
              echo '<tr><td><input type="text" name="idCita['.$datosCitas[0].']" value="'.$datosCitas[0].'" disabled>
              </td><td><input type="text" name="fechaCita['.$datosCitas[0].']" value="'.date_format($fechaCita,'d-m-Y').'" disabled>
              </td><td><input type="text" name="horaCita['.$datosCitas[0].']" value="'.$datosCitas[2].'" disabled>
              </td><td><input type="text" name="nombreServicio['.$datosCitas[0].']" value="'.$datosCitas[3].'" disabled>
              </td><td><input type="text" name="nombreTrabajador['.$datosCitas[0].']" value="'.$datosCitas[4].'" disabled>
              <td align=center> <input type=checkbox id="check" name="borra['.$datosCitas[0].']" value="Si"></td></tr>';
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