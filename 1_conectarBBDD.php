<?php

// Activamos el reporte de errores de MySQLi para que muestre problemas si ocurren
mysqli_report(MYSQLI_REPORT_ERROR);

/* //Datos necesarios para la conexión al servidor de base de datos
$servidor = "localhost"; // Dirección del servidor (en este caso, el propio ordenador)
$usuario = "root";       // Usuario de MySQL
$clave = "";             // Contraseña (vacía en este caso)*/
$servidor = $_REQUEST['servidor'] ; // Dirección del servidor (en este caso, el propio ordenador)
$usuario = $_REQUEST['usuario'];       // Usuario de MySQL
$clave = $_REQUEST['password'];  
// Intentamos crear la conexión al servidor MySQL
// El @ evita que PHP muestre errores directamente en pantalla
@$mysqli = new mysqli($servidor, $usuario, $clave);

// Comprobamos si ha habido un error en la conexión
if ($mysqli->connect_errno)
{
    // Si hay error, mostramos el mensaje y el código del error
    echo "<br>Fallo al conectar a Mysql: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
}
else 
{
    // Si no hay error, la conexión se ha realizado correctamente
    echo "Te has conectado al servidor MYSQL";
}

?>