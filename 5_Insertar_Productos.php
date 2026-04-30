<?php

// Incluimos el archivo que contiene la conexión a la base de datos
require("usargestiona.php");

/* =====================================================
   INSERCIÓN DEL PRIMER PRODUCTO
   ===================================================== */

// Consulta SQL para insertar un producto

$codigoProducto = $_REQUEST['codigoProducto'];
$descripcionProducto = $_REQUEST['descripcionProducto'];
$codigoProveedorProducto = $_REQUEST['codigoProveedorProducto'];
$precioCompraProducto = $_REQUEST['precioCompraProducto'];
$precioVentaProducto = $_REQUEST['precioVentaProducto'];
$stockProducto = $_REQUEST['stockProducto'];



$consulta = "INSERT INTO productos 
(codigoProducto, descripcionProducto, codigoProveedorProducto, precioCompraProducto, precioVentaProducto, stockProducto) 
VALUES ($codigoProducto,$descripcionProducto,$codigoProveedorProducto,$precioCompraProducto,$precioVentaProducto,$stockProducto)";

// Ejecutamos la consulta
if (!@$mysqli->query($consulta)) 
{
   // Si ocurre un error, mostramos información detallada
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>";
   echo "Error: " . $mysqli->error . "<br>";
   exit;
}
else 
{
    // Si todo va bien
    echo "<br> PRODUCTO insertado";
}

/* =====================================================
   INSERCIÓN DEL SEGUNDO PRODUCTO
   ===================================================== */


// Ejecutamos la consulta
if (!@$mysqli->query($consulta)) 
{
   // Control de errores
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>";
   echo "Error: " . $mysqli->error . "<br>";
   exit;
}
else 
{
    // Confirmación de inserción correcta
    echo "<br> PRODUCTO insertado";
}

?>