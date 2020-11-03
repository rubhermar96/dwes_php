<?php
session_start();
include 'head.php';
if(isset($_REQUEST['traducir'])){
    $palabra = htmlspecialchars($_REQUEST['palabra'],ENT_QUOTES);
    foreach($_SESSION['diccionario'] as $key=>$valor){
        if($key===$palabra){
            echo $valor;
        }else{
            echo '<p>La palabra no existe en el diccionario';
        }
    }
}
echo '<form method="post" action="">
        <label for="palabra">Palabra a traducir</label>
        <input type="text" id="palabra" name="palabra" value=""><br><br>
        <input type="submit" value="TRADUCIR" name="traducir">
        <input type="reset" value="BORRAR" name="borrar"><br><br>
        <label for="traduccion">Traducccion</label>
        <input type="text" value="">
        </form>';
        
 
 include 'pie.php';

