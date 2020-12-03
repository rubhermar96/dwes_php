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
    <title>Nueva Cita</title>
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
      <h2>Nueva Cita</h2>
      <form method="post" action="inicioCliente.php" class="formPerfil2" id="regSer">
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
  	  		<label>Mi ID</label>
  	  		<input type="text" name="idCliente" value="<?php echo $_SESSION['idCliente']; ?>"required disabled>
        </div>
        <div class="input-group">
          <label>Servicio</label>
          <select name="idServicio">
          <?php
            $queryServicio = "SELECT id_servicio, nombre_servicio, coste_servicio FROM servicio";
            $resultsServicio = mysqli_query($_SESSION['db'],$queryServicio);
            while($datosServicio = mysqli_fetch_array($resultsServicio)){
                echo '<option value="'.$datosServicio[0].'">'.$datosServicio[1].' -- '.$datosServicio[2].'€</option>';
            }  
            ?>
          </select>
        </div>
        <div class="input-group">
          <label>Peluquero</label>
          <select name="idTrabajador">
          <?php
            $queryTrabajador = "SELECT id_trabajador, nombre_trabajador, apellidos_trabajador FROM trabajador";
            $resultsTrabajador = mysqli_query($_SESSION['db'],$queryTrabajador);
            while($datosTrabajador = mysqli_fetch_array($resultsTrabajador)){
              if($datosTrabajador[0]!= 1){
              echo '<option value="'.$datosTrabajador[0].'">'.$datosTrabajador[1].' '.$datosTrabajador[2].'</option>';
              }
            }
            ?>
          </select>
        </div><br>
        <div class="input-group">
  	  		<label>Fecha</label>
  	  		<input type="date" name="fechaCita" min="<?php echo date('Y-m-d');?>" required>
        </div>
        <div class="input-group">
          <label>Hora</label>
          <select name="horaCita">
              <optgroup label="Mañana">
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="13:00">13:00</option>
              <option value="13:30">13:30</option>
            </optgroup>
            <optgroup label="Tarde">
              <option value="17:00">17:00</option>
              <option value="17:30">17:30</option>
              <option value="18:00">18:00</option>
              <option value="18:30">18:30</option>
              <option value="19:00">19:00</option>
              <option value="19:30">19:30</option>
              <option value="20:00">20:00</option>
              <option value="20:30">20:30</option>
            </optgroup>
          </select>
        </div>
        <div class="input-group">
  	  		<button type="submit" class="btn" name="reg_cita">Añadir Cita</button>
  		</div>
      </form>
    </div>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>