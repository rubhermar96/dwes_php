<?php

include 'head.php';
                                             
session_start();
$incidencias[]=array(1,'Si','Urbanismo','2020-11-23 10:00','plaza mayor','192.168.15.20','farola rota');
$incidencias[]=array(2,'Si','Urbanismo','2020-11-23 10:10','plaza mayor','192.168.15.20','farola rota otra vez');
$_SESSION['incidencias']=$incidencias;
echo'<center><img src="images/alta_incidencia.png" width="600" height="300" alt="incidencia"/></center>';


include 'pie.php';

