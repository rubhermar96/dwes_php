<?php
include("C:/xampp/htdocs/dwes_php/pruebas/seguridad/mysql.inc.php");
conecta1($c);
if(mysqli_close($c)){
	print "<br>Se ha cerrado la conexión con el servidor de bases de datos<BR>";
}

?>

