<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'ruben', 'toor', 'scruben');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['usernameCliente']);
  $email = mysqli_real_escape_string($db, $_POST['emailCliente']);
  $password = mysqli_real_escape_string($db, $_POST['passwordCliente']);
  $nombre = mysqli_real_escape_string($db, $_POST['nombreCliente']);
  $apellidos = mysqli_real_escape_string($db, $_POST['apellidosCliente']);
  $dni = mysqli_real_escape_string($db, $_POST['dniCliente']);
  $tlfn = mysqli_real_escape_string($db, $_POST['tlfnCliente']);
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM cliente WHERE usuario_cliente='$username' OR email_cliente='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['usuario_cliente'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email_cliente'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO cliente (dni_cliente, nombre_cliente, tfno_cliente, email_cliente, pass_cliente, usuario_cliente, apellidos_cliente) 
                VALUES ('$dni','$nombre',$tlfn,'$email','$password','$username','$apellidos');";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Registrado!";
  	header('location: index.php');
  }
}

//LOGIN
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM cliente WHERE usuario_cliente='$username' AND pass_cliente='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Error Usuario/Contraseña");
        }
    }
  }
  
  ?>