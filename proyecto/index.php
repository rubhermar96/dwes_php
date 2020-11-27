<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="styleindex.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="inicio">
            <a href="index.php"><span><i class="material-icons">home</i>Inicio</span></a>
        </div>
        <div class="administrador">
            <a class="btnAdmin" href="admins/login.php">Administrador</a>
        </div>
    </nav>
    <main>
        <div id="titulo">
            <h1>Peluquería "Nombre"</h1>
        </div>
        <div class="contColumnas">
            <div class="columnas" id="columna1">
                <div class="imgPersonas">
                    <img src="img/hombre.jpg" alt="Corte Hombre">
                </div>
                <h2>Corte Hombre</h2>
                <h2>xx,xx€</h2>
            </div>
            <div class="columnas" id="columna2">
                <div class="imgPersonas">
                    <img src="img/mujer.png" alt="Corte Mujer">
                </div>
                <h2>Corte Mujer</h2>
                <h2>xx,xx€</h2>
            </div>
            <div class="columnas" id="columna3">
                <div class="imgPersonas">
                    <img src="img/niña.png" alt="Corte Niño/a">
                </div>
                <h2>Corte Niño/a</h2>
                <h2>xx,xx€</h2>
            </div>
        </div>
        <div class="acceso">
            <div class="btnAcceso"><a href="clientes/login.php">Acceso Clientes</a></div>
        </div>
        <div class="parallax"></div>  
    </main>
    <footer>
        <p>Proyecto Desarrollo Web Entorno Servidor - Rubén Herrera Marcos</p>
    </footer>
</body>
</html>