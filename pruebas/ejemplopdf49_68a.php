<? function Encabezado() { ?>
    <HTML>
    <HEAD>
    <TITLE>Titulo de mi página</TITLE>
    </HEAD>
    <BODY BGCOLOR="#FF0000">
    <? } ?>
    <? function Pie() { ?>
    <HR>
    </BODY>
    </HTML>
    <? } ?>
    <? Encabezado(); ?>
    Este es texto que aparecerá en el cuerpo de la página.         
    Está fuera de los scripts de php y será considerado         
    como un texto HTML. Debajo aparecerá la línea horizontal        
    que insertaremos mediante una nueva llamada a la función Pie
    <? Pie(); ?>