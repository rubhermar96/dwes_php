<?php
include 'head.php';
                                             
 echo'<img src="images/arrays.png" width="600" height="355" alt="imagen_bucles"/>';
 $diccionario = ["coche" => "car", "pescado" => "fish", "cama" => "bed", "mesa" => "table", "silla" => "chair","cerveza" => "beer", "casa" => "house", "gato" => "cat", "perro" => "dog", "bailar" => "dance"];

 $_SESSION['diccionario']=$diccionario;
 include 'pie.php';
											
                           