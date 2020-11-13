<?php 

# definimos una variable con el NOMBRE DE LA BASE DE DATOS


$base="scruben";

#definimos otra variable con el NOMBRE de LA TABLA ORIGEN DE LOS DATOS


# establecemos la conexión con el servidor

$c=mysqli_connect ("localhost","rubens","toor");

#Seleccionamos la BASE DE DATOS en la que PRETENDEMOS TRABAJAR

mysqli_select_db ($c,$base);


# veamos ahora una consulta SIMULTANEA de varias tablas
# fijate despues del SELECT
# anteponemos el nombre de la base al campo separados por un punto
# escribimos con esa sintaxis (tabla.campo) los campos de la consulta
# detras del FROM enumeramos las distintas TABLAS separadas por comas
# a continuación el WHERE que como ves puede relacionar campos de todas las tablas en uso
#
# la condición es que los DNI sean iguales en todas las tablas
# recuerda que lo hemos puesto como clave principal en todas ellas
#
# fijate en la ordenacion
# ordenamos por PUNTUACION TOTAL, es decir por la suma de las puntos de las tres tablas
# y ordenamos DESCENDENTE (de mayor a menor)
#
# 




$resultado=mysqli_query($c,"SELECT demo4.DNI,demo4.Nombre,demo4.Apellido1, demo4.Apellido2 ,demodat1.Puntos, demodat2.Puntos, demodat3.Puntos FROM demo4, demodat1, demodat2, demodat3 WHERE (demo4.DNI=demodat1.DNI AND demo4.DNI=demodat2.DNI AND demo4.DNI=demodat3.DNI) ORDER BY demodat1.Puntos+demodat2.Puntos+demodat3.Puntos DESC ");

# presentamos la salida en forma de tabla HTML

# estos son los encabezados

echo "<table align=center border=2>";
echo "<td colspan=4 align=center> Datos personales</td>";
echo "<td align=center>Prueba 1</b>";
echo "<td align=center>Prueba 2</b>";
echo "<td align=center>Prueba 3</b>";
echo "<td align=center>Puntos Totales</td></tr>";

# establecemos un bucle para leer todas las líneas del resultado de cada consulta

 while($salida = mysqli_fetch_array($resultado,MYSQLI_BOTH)){

	# escribimos un bucle que nos lea desde el indice 0 hasta el indice 6
        # de la matriz de salida ya que los indices 0,1,2,3,4...
        # se corresponden con el número de orden tal como fueron establecidos
        # los campos en la opción SELECT: 0 es el indice del primero
        # 1 el de segundo, 2 el del tercero, etc. etc.

       for ($i=0;$i<7;$i++){

        #imprimimos el valor de del array de indice $i;         

	echo "<td>",$salida[$i],"</td>";

        #cerramos el bucle for

		}   
 
	# ahora imprimimos la suma de las Puntuaciones
	# y hacemos una nueva linea en la tabla

        echo"<td>",$salida[4]+$salida[5]+$salida[6],"</Td>";    
	echo "<tr>";

# cerramos el bucle while

}

#escribimos la etiqueta de cierre de la tabla (HTML)

echo "</table>";


# cerramos la conexión... y listo...

 		mysqli_close($c)
?> 



