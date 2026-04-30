<?php

// Incluimos el archivo donde ya se realiza la conexión
// y la selección de la base de datos (reutilización de código)
require("usargestiona.php");

// Consulta SQL para insertar un nuevo proveedor en la tabla
$consulta = "INSERT INTO proveedores 
(codigoProveedor, nombreProveedor, direccionProveedor, telefonoProveedor, ciudadProveedor, provinciaProveedor, emailProveedor) 
VALUES 
('PR1','ACEROS DUROS S.L.','CL Piedras Blancas','91456789','Fuenlabrada','Madrid','ventas@acerosduros.org');";

// Ejecutamos la consulta
// query() devuelve false si falla y true si se ejecuta correctamente
if (!@$mysqli->query($consulta)) 
{
   // Si hay error, mostramos información detallada
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>"; // Código del error
   echo "Error: " . $mysqli->error . "<br>";     // Descripción del error

   // Finalizamos el programa
   exit;
}
else 
{
    // Si la inserción se realiza correctamente
    echo "<br> PROVEEDOR insertado";
}

?>