<?php
session_start();

$username = "";
$errors = array(); 

// CONEXION BASE DE DATOS
$db = mysqli_connect('localhost', 'ruben', 'toor', 'scruben');

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
    $_SESSION['passwordTrabajador'] = $password;
    $_SESSION['nombreTrabajador']=$nombre;
    $_SESSION['apellidosTrabajador']=$apellidos;
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
        $datos = mysqli_fetch_array($results);
        //Adminsitracion Clientes
        $queryClientes = "SELECT * FROM cliente";
        $resultsClientes = mysqli_query($db,$queryClientes);
        $datosClientes = mysqli_fetch_array($results);
        $_SESSION['datosClientes']=$datosClientes;
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
  
  ?>