<?php

// Activamos el reporte de errores de MySQLi
mysqli_report(MYSQLI_REPORT_ERROR);

// Datos de conexión al servidor MySQL
$servidor = "localhost"; // Servidor donde está MySQL
$usuario = "root";       // Usuario
$clave = "";             // Contraseña

// Intentamos establecer la conexión
// El @ evita que se muestren errores directamente en pantalla
@$mysqli = new mysqli($servidor, $usuario, $clave);

// Comprobamos si hay error en la conexión
if ($mysqli->connect_errno)
{
    // Mostramos información del error
    echo "<br>Fallo al conectar a Mysql: " . $mysqli->connect_error . " " . $mysqli->connect_errno;
    
    // Finalizamos el programa inmediatamente
    die("<br> Salida del programa. Fatal Error");
}
else 
{
    // Si todo va bien, confirmamos la conexión
    echo "Te has conectado al servidor MYSQL";
}

// Consulta SQL para crear una base de datos si no existe
$consulta = "CREATE DATABASE IF NOT EXISTS gestiona;";

// Ejecutamos la consulta
// query() devuelve false si hay error y true si todo va bien
if (!@$mysqli->query($consulta)) 
{
   // Si falla la consulta, mostramos mensajes de error
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>"; // Código del error
   echo "Error: " . $mysqli->error . "<br>";     // Mensaje del error

   // Terminamos la ejecución del script
   exit;
}
else 
{
    // Si la consulta se ejecuta correctamente
    echo "<br> BD creada con éxito";
}

?>