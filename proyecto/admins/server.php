<?php
session_start();

$username = "";
$errors = array(); 

// CONEXION BASE DE DATOS
$db = mysqli_connect('localhost', 'ruben', 'toor', 'scruben');
$_SESSION['db']=$db;

// REGISTRO TRABAJADORES
if (isset($_POST['reg_user'])) {
  // RECEPCION DATOS DE REGISTER.PHP
  $username = mysqli_real_escape_string($db, $_POST['usernameTrabajador']);
  $password = mysqli_real_escape_string($db, $_POST['passwordTrabajador']);
  $nombre = mysqli_real_escape_string($db, $_POST['nombreTrabajador']);
  $apellidos = mysqli_real_escape_string($db, $_POST['apellidosTrabajador']);
  
  //COMPROBAR SI EL USUARIO YA EXISTE
  $user_check_query = "SELECT * FROM trabajador WHERE usuario_trabajador='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['usuario_trabajador'] === $username) {
      array_push($errors, "El Nombre de Usuario ya Existe");
    }
  }

  //REGISTRO DEL USUARIO
  if (count($errors) == 0) {
  	$password = md5($password);//ENCRIPTADO CONTRASEÑA

  	$query = "INSERT INTO trabajador (nombre_trabajador, usuario_trabajador, pass_trabajador, apellidos_trabajador) 
                VALUES ('$nombre','$username','$password','$apellidos');";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "Trabajador Registrado";
  	header('location: adminTrabajadores.php');
  }
}

//LOGIN TRABAJADORES
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (count($errors) == 0) {
      if($password!='admin'){
        $password = md5($password);
      }
        $query = "SELECT * FROM trabajador WHERE usuario_trabajador='$username' AND pass_trabajador='$password'";
        $results = mysqli_query($db, $query);
        $datos = mysqli_fetch_array($results);
        //Adminsitracion Clientes
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['passwordTrabajador'] = $datos[3];
          $_SESSION['nombreTrabajador']=$datos[1];
          $_SESSION['apellidosTrabajador']=$datos[4];
          $_SESSION['success'] = "Sesion Iniciada Correctamente";
          header('location: index.php');
        }else {
            array_push($errors, "Error Usuario/Contraseña");
        }
    }
  }
  //MODIFICAR ADMIN
  if (isset($_POST['mod_admin'])) {
    // RECEPCION DATOS DE PERFILCLIENTE.PHP
    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($db, $_POST['passwordTrabajador']);
    $nombre = mysqli_real_escape_string($db, $_POST['nombreTrabajador']);
    $apellidos = mysqli_real_escape_string($db, $_POST['apellidosTrabajador']);
    if($password!=""){
        $password = md5($password);//ENCRIPTADO DE LA CONTRASEÑA
  
        $query = "UPDATE trabajador 
        SET pass_trabajador='$password', nombre_trabajador='$nombre', apellidos_trabajador='$apellidos'
        WHERE usuario_trabajador='$username';";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['nombreTrabajador'] = $nombre;
        $_SESSION['apellidosTrabajador'] = $apellidos;
        $_SESSION['success'] = "Modificado Correctamente";
    }else{
        $query = "UPDATE trabajador 
        SET  nombre_trabajador='$nombre', apellidos_trabajador='$apellidos'
        WHERE usuario_trabajador='$username';";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['nombreTrabajador'] = $nombre;
        $_SESSION['apellidosTrabajador'] = $apellidos;
        $_SESSION['success'] = "Modificado Correctamente";
    }
  }

  //ELIMINAR CLIENTE DESDE CUENTA ADMIN
  if(isset($_POST['del_Cli_Admin'])){
    foreach($_POST['borra'] as $indice=>$valor){
      mysqli_query($db,"DELETE FROM cliente WHERE (id_cliente=$indice)");
    }
    header('location: adminClientes.php');
  }
  if(isset($_POST['del_tra_Admin'])){
    foreach($_POST['borra'] as $indice=>$valor){
      mysqli_query($db,"DELETE FROM trabajador WHERE (id_trabajador=$indice)");
    }
    header('location: adminTrabajadores.php');
  }

  //MODIFICAR CLIENTE DESDE CUENTA ADMIN
  /*if (isset($_POST['mod_Cli_Admin'])){
      $username = mysqli_real_escape_string($db, $_POST['usernameCliente']);
      $email = mysqli_real_escape_string($db, $_POST['emailCliente']);
      $password = mysqli_real_escape_string($db, $_POST['passwordCliente']);
      $nombre = mysqli_real_escape_string($db, $_POST['nombreCliente']);
      $apellidos = mysqli_real_escape_string($db, $_POST['apellidosCliente']);
      $dni = mysqli_real_escape_string($db, $_POST['dniCliente']);
      $tlfn = mysqli_real_escape_string($db, $_POST['tlfnCliente']);
      if($password!=""){
        $password=md5($password);
        mysqli_query($db,"UPDATE cliente SET pass_cliente='$password', usuario_cliente='$username', email_cliente='$email',
        nombre_cliente='$nombre', apellidos_cliente='$apellidos', dni_cliente='$dni', tfno_cliente=$tlfn
        WHERE id_cliente=$indice;");
      }else{
        mysqli_query($db,"UPDATE cliente SET usuario_cliente='$username', email_cliente='$email',
        nombre_cliente='$nombre', apellidos_cliente='$apellidos', dni_cliente='$dni', tfno_cliente=$tlfn
        WHERE id_cliente=$indice;");
      }
    header('location: adminClientes.php');
  }*/
  if(isset($_POST['mod_Cli_Admin'])){
    foreach($_POST['usernameCliente'] as $key => $value){
      mysqli_query($db,"UPDATE cliente SET usuario_cliente='$value' WHERE id_usuario=$key");
    }
  }

  // REGISTRO Servicios
if (isset($_POST['reg_service'])) {
  // RECEPCION DATOS DE adminServicios.php
  $tipoServicio = mysqli_real_escape_string($db, $_POST['tipoServicio']);
  $costeServicio = mysqli_real_escape_string($db, $_POST['costeServicio']);
  $nombreServicio = mysqli_real_escape_string($db, $_POST['nombreServicio']);
  
  //COMPROBAR SI EL USUARIO YA EXISTE
  $user_check_query = "SELECT * FROM servicio WHERE nombre_servicio='$nombreServicio' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $servicio = mysqli_fetch_assoc($result);
  
  if ($servicio) { 
    if ($servicio['nombre_servicio'] === $nombreServicio) {
      array_push($errors, "El Servicio ya existe");
    }
  }

  //REGISTRO DEL Servicio
  if (count($errors) == 0) {

  	$query = "INSERT INTO servicio (tipo_servicio, coste_servicio, nombre_servicio) 
                VALUES ('$tipoServicio',$costeServicio,'$nombreServicio');";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "Servicio Registrado";
  	header('location: adminServicios.php');
  } 
}
if(isset($_POST['del_ser_Admin'])){
  foreach($_POST['borra'] as $indice=>$valor){
    mysqli_query($db,"DELETE FROM servicio WHERE (id_servicio=$indice)");
  }
  header('location: adminServicios.php');
}
if(isset($_POST['del_cita_Admin'])){
  foreach($_POST['borra'] as $indice=>$valor){
    mysqli_query($db,"DELETE FROM cita WHERE (id_cita=$indice)");
  }
  header('location: inicioAdmins.php');
}
  ?>