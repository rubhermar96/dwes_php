<?php
session_start();

$username = "";
$errors = array(); 

// CONEXION BASE DE DATOS
$db = mysqli_connect('localhost', 'rubens', 'toor', 'scruben');

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
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Trabajador Registrado";
  	header('location: index.php');
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
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Sesion Iniciada Correctamente";
          header('location: index.php');
        }else {
            array_push($errors, "Error Usuario/Contraseña");
        }
    }
  }
  
  ?>