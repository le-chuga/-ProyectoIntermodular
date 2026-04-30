<?php

// Activamos el reporte de errores de MySQLi
// Esto permite que PHP muestre errores relacionados con la base de datos
mysqli_report(MYSQLI_REPORT_ERROR);

// Datos necesarios para la conexión
$servidor = "localhost"; // Dirección del servidor MySQL
$usuario = "root";        // Usuario de la base de datos
$clave = "";             // Contraseña (vacía en este caso)

// Intentamos conectarnos al servidor MySQL
// El símbolo @ evita que se muestren errores directamente en pantalla
@$mysqli = new mysqli($servidor, $usuario, $clave);

// Comprobamos si ha habido error en la conexión
if ($mysqli->connect_errno)
{
    // Mostramos información del error
    echo "<br>Fallo al conectar a Mysql: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
    
    // Finalizamos el programa si ocurre un error grave
    die ("<br> Salida del programa. Fatal Error");
}
else 
{
    // Si la conexión es correcta
    echo "Te has conectado al servidor MYSQL";
}

// Nombre de la base de datos que queremos usar
$basedatos = "gestiona";

// Intentamos seleccionar la base de datos
if ($mysqli->select_db($basedatos)) // Devuelve true si todo va bien
{
    // Confirmamos que la base de datos está lista para usarse
    echo "<br> BD seleccionada";
}
else 
{
    // Si falla, detenemos el programa porque no se puede continuar
    die ("Error grave. BD no seleccionada");
}

?>

