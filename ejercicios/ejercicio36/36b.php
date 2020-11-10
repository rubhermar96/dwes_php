<?php
session_cache_limiter('nocache,private');
session_name('ejercicio36');
session_start();
$_SESSION['nom']=$_POST['nombre'];
$_SESSION['col']=$_POST['color'];
echo "El nombre del usuario es: ".$_SESSION['nom'],"<br>";
?>
<html>
    <head>
        <body bgcolor="<?php echo $_SESSION['col']?>">
        <a href="36c.php?<?php echo session_name()."=".session_id()?>">Propagar la sesion</a>
        </body>
    </head>
</html>
