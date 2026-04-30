<?php

// Incluimos el archivo donde ya se ha realizado la conexión
// y la selección de la base de datos
require("usargestiona.php");

// Consulta SQL:
// Selecciona todos los productos cuyo precio de compra sea menor que 15
$consulta = "SELECT * FROM productos WHERE precioCompraProducto < 15;";

// Ejecutamos la consulta
// Si falla, devuelve false; si funciona, devuelve un objeto con los resultados
if (!@$resultado = $mysqli->query($consulta)) 
{
   // Mostramos información del error si la consulta falla
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>"; // Código del error
   echo "Error: " . $mysqli->error . "<br>";     // Descripción del error
   exit;
}

// Obtenemos el número de registros (filas) devueltos por la consulta
$numeroregistros = $resultado->num_rows;

// Mostramos cuántos productos cumplen la condición
echo "El número de productos recuperados es: $numeroregistros";

?>
