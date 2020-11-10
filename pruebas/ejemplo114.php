<?php
$numero=@$_COOKIE['visitante'];
$numero+=1;
setcookie("visitante",$numero,time()+86400);
if($numero==1){print "Es la $numero vez que visitas esta página";}
if($numero>1){print "Es la $numero ª vez  que visitas esta página";}
?>  