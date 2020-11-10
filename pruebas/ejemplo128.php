<?php
# iniciamos la sesión
session_start();
# visualizamos el identificador de sesión
echo "Este es el identificador de sesion: ",session_id(),"<br>";
# registramos una variable de sesión asignandole un nombre
$_SESSION['variable1'];
#asignamos un valor a esa variable de sesión
$_SESSION['variable1']="Filiberto Gómez";
# registramos una nueva variable de sesión
#asignandole directamente un valor
$_SESSION['variable2']="Otro filiberto, este Pérez";
#comprobamos la existencia de la variables de sesión
echo "Mi_variable1 esta registrada: ",
isset($_SESSION['variable1']),"<br>";
#leemos el contenido de esa variable
 print "Su valor es: ".$_SESSION['variable1']."<br>";
#comprobamos la existencia de la otra variable y la visualizamos
echo "Mi variable2 esta registrada :",
 isset($_SESSION['variable2']),"<br>";
print $_SESSION['variable2']."<br>";
#destruimos la variable1
unset($_SESSION['variable1']);
echo "La variable1 ha sido destruida:",
 isset($_SESSION['variable1']),"<br>";
print $_SESSION['variable1']."<br>";
#destruimos todas las variables restantes
unset($_SESSION);
#comprobamos que han sido destruidas
echo "La variable1 ya estaba vacia:",
 isset($_SESSION['variable1']),"<br>";
print $_SESSION['variable1']."<br>";
echo "También ha sido destruida la variable2: ",
 $_SESSION['variable2'],"<br>";
print $_SESSION['variable2']."<br>";
?>