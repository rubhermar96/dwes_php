<?php
session_cache_limiter('nocache,private');
session_name('Ejercicio36');
session_start();
foreach($_SESSION as $indice=>$valor){
    print("variable: ".$indice." Valor: ".$valor."<br>");
}
?>
<html>
<head>
<body bgcolor="<?php echo $_SESSION['col']?>">
    
</body>
</head>
</html>