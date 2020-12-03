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
    <title>Citas Peluqueria</title>
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
      <h2>Citas Peluquería</h2>
      <form method="post" action="inicioAdmins.php" class="formPerfil2">
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
          <button type="submit" class="btn4" name="del_cita_Admin" onclick="el()">Eliminar Cita</button>
        </div>
        <table>
          <tbody>
            <tr><td>ID Cita</td><td>Fecha Cita</td><td>Hora Cita</td><td>Cliente</td><td>Servicio</td><td>Trabajador</td></tr>
            <?php
            $queryCitas = "SELECT cita.id_cita, cita.fecha_cita, cita.hora_cita, cliente.nombre_cliente, cliente.apellidos_cliente, servicio.nombre_servicio, trabajador.nombre_trabajador FROM cita, servicio, trabajador, cliente WHERE cita.id_servicio=servicio.id_servicio AND cita.Trabajador_id_trabajador=trabajador.id_trabajador AND cita.id_cliente=cliente.id_cliente ORDER BY fecha_cita;";
            $resultsCitas = mysqli_query($_SESSION['db'],$queryCitas);

            while($datosCitas = mysqli_fetch_array($resultsCitas)){
              $fechaCita = new DateTime($datosCitas[1]);
              echo '<tr><td><input type="text" name="idCita['.$datosCitas[0].']" value="'.$datosCitas[0].'" disabled>
              </td><td><input type="text" name="fechaCita['.$datosCitas[0].']" value="'.date_format($fechaCita,'d-m-Y').'" disabled>
              </td><td><input type="text" name="horaCita['.$datosCitas[0].']" value="'.$datosCitas[2].'">
              </td><td><input type="text" name="nombreCliente['.$datosCitas[0].']" value="'.$datosCitas[3].' '.$datosCitas[4].'" disabled>
              </td><td><input type="text" name="nombreServicio['.$datosCitas[0].']" value="'.$datosCitas[5].'" disabled>
              </td><td><input type="text" name="nombreTrabajador['.$datosCitas[0].']" value="'.$datosCitas[6].'" disabled>
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
</body>
</html>