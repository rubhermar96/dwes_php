<?php
session_start();

$username = "";
$email    = "";
$fechaCita = new DateTime();
$errors = array(); 

// CONEXION BASE DE DATOS
$db = mysqli_connect('localhost', 'ruben', 'toor', 'scruben');
$_SESSION['db']=$db;
// REGISTRAR CLIENTE
if (isset($_POST['reg_user'])) {
  // RECEPCION DATOS DE REGISTER.PHP
  $username = mysqli_real_escape_string($db, $_POST['usernameCliente']);
  $email = mysqli_real_escape_string($db, $_POST['emailCliente']);
  $password = mysqli_real_escape_string($db, $_POST['passwordCliente']);
  $nombre = mysqli_real_escape_string($db, $_POST['nombreCliente']);
  $apellidos = mysqli_real_escape_string($db, $_POST['apellidosCliente']);
  $dni = mysqli_real_escape_string($db, $_POST['dniCliente']);
  $tlfn = mysqli_real_escape_string($db, $_POST['tlfnCliente']);
  
  //COMPROBAR SI EL CLIENTE EXISTE COMPROBANDO EL NOMBRE DE USUARIO Y EMAIL
  $user_check_query = "SELECT * FROM cliente WHERE usuario_cliente='$username' OR email_cliente='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['usuario_cliente'] === $username) {
      array_push($errors, "El Usuario ya Existe");
    }

    if ($user['email_cliente'] === $email) {
      array_push($errors, "El Email ya Existe");
    }
  }

  //REGISTRO DEL CLIENTE
  if (count($errors) == 0) {
  	$password = md5($password);//ENCRIPTADO DE LA CONTRASEÑA

  	$query = "INSERT INTO cliente (dni_cliente, nombre_cliente, tfno_cliente, email_cliente, pass_cliente, usuario_cliente, apellidos_cliente) 
                VALUES ('$dni','$nombre',$tlfn,'$email','$password','$username','$apellidos');";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['nombreCliente'] = $nombre;
    $_SESSION['dniCliente'] = $dni;
    $_SESSION['tlfnCliente'] = $tlfn;
    $_SESSION['emailCliente'] = $email;
    $_SESSION['apellidosCliente'] = $apellidos;
  	$_SESSION['success'] = "Registrado Correctamente";
  	header('location: index.php');
  }
}

//LOGIN CLIENTE
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM cliente WHERE usuario_cliente='$username' AND pass_cliente='$password'";
        $results = mysqli_query($db, $query);
        $datos = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['idCliente']=$datos[0];
          $_SESSION['username'] = $username;
          $_SESSION['nombreCliente'] = $datos[2];
          $_SESSION['dniCliente'] = $datos[1];
          $_SESSION['tlfnCliente'] = $datos[3];
          $_SESSION['emailCliente'] = $datos[4];
          $_SESSION['apellidosCliente'] = $datos[7];
          $_SESSION['success'] = "Sesion Iniciada Correctamente";
          header('location: index.php');
        }else {
            array_push($errors, "Error Usuario/Contraseña");
        }
    }
  }
  
  //MODIFICAR USER
  if (isset($_POST['mod_user'])) {
    // RECEPCION DATOS DE PERFILCLIENTE.PHP
    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($db, $_POST['passwordCliente']);
    $nombre = mysqli_real_escape_string($db, $_POST['nombreCliente']);
    $apellidos = mysqli_real_escape_string($db, $_POST['apellidosCliente']);
    $dni = mysqli_real_escape_string($db, $_POST['dniCliente']);
    $tlfn = mysqli_real_escape_string($db, $_POST['tlfnCliente']);
    if($password!=""){
        $password = md5($password);//ENCRIPTADO DE LA CONTRASEÑA
  
        $query = "UPDATE cliente 
        SET pass_cliente='$password', nombre_cliente='$nombre', apellidos_cliente='$apellidos', dni_cliente='$dni', tfno_cliente=$tlfn
        WHERE usuario_cliente='$username';";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['nombreCliente'] = $nombre;
        $_SESSION['dniCliente'] = $dni;
        $_SESSION['tlfnCliente'] = $tlfn;
        $_SESSION['apellidosCliente'] = $apellidos;
        $_SESSION['success'] = "Modificado Correctamente";
    }else{
        $query = "UPDATE cliente 
        SET  nombre_cliente='$nombre', apellidos_cliente='$apellidos', dni_cliente='$dni', tfno_cliente=$tlfn
        WHERE usuario_cliente='$username';";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['nombreCliente'] = $nombre;
        $_SESSION['dniCliente'] = $dni;
        $_SESSION['tlfnCliente'] = $tlfn;
        $_SESSION['apellidosCliente'] = $apellidos;
        $_SESSION['success'] = "Modificado Correctamente";
    }
  }

  //Eliminar Cuenta Cliente
  if(isset($_POST['del_user'])){
    $username = $_SESSION['username'];
    $query = "DELETE FROM cliente WHERE usuario_cliente='$username';";
    mysqli_query($db, $query);
    $_SESSION['success'] = "Cuenta Eliminada Correctamente";
    header('location: login.php');
  }
    // REGISTRO Cita
if (isset($_POST['reg_cita'])) {
  // RECEPCION DATOS DE inicioCliente.php
  $fechaCita = mysqli_real_escape_string($db, $_POST['fechaCita']);
  $idCliente = $_SESSION['idCliente'];
  $idServicio = mysqli_real_escape_string($db, $_POST['idServicio']);
  $idTrabajador = mysqli_real_escape_string($db, $_POST['idTrabajador']);
  $horaCita = mysqli_real_escape_string($db, $_POST['horaCita']);

  
  	$query = "INSERT INTO cita (fecha_cita, hora_cita, id_cliente, id_servicio, Trabajador_id_trabajador) 
                VALUES ('$fechaCita','$horaCita','$idCliente','$idServicio','$idTrabajador');";
  	mysqli_query($db, $query);
    //header('location: citasCliente.php');
    $_SESSION['success'] = "Cita Registrada";
}
if(isset($_POST['del_cita_Cli'])){
  foreach($_POST['borra'] as $indice=>$valor){
    mysqli_query($db,"DELETE FROM cita WHERE (id_cita=$indice)");
  }
  header('location: citasCliente.php');
}

  ?>