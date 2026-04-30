<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listado de productos</title>
</head>

<body>

<!-- Tabla HTML donde se mostrarán los datos -->
<table width="200" border="1">

  <!-- Fila de cabecera -->
  <tr>
    <th scope="col">Código Producto</th>
    <th scope="col">Descripción</th>
    <th scope="col">Precio Compra</th>
  </tr>

<?php

// Incluimos el archivo de conexión a la base de datos
require("usargestiona.php");

// Consulta SQL:
// Seleccionamos los productos cuyo precio de compra sea menor que 15
$consulta = "SELECT * FROM productos WHERE precioCompraProducto < 15;";

// Ejecutamos la consulta
if (!@$resultado = $mysqli->query($consulta)) 
{
   // Si ocurre un error, mostramos información
   echo "Lo sentimos. Aplicación no funciona<br>";
   echo "Error en la consulta: $consulta <br>";
   echo "Num.error: " . $mysqli->errno . "<br>";
   echo "Error: " . $mysqli->error . "<br>";
   exit;
}

// Recorremos los resultados fila a fila
// fetch_assoc() devuelve cada fila como un array asociativo
while ($fila = $resultado->fetch_assoc())
{
   // Mostramos cada fila dentro de la tabla HTML
   echo "<tr>";
   
   // Mostramos cada campo en una celda <td>
   echo "<td>" . $fila["codigoproducto"] . "</td>";
   echo "<td>" . $fila["descripcionproducto"] . "</td>";
   echo "<td>" . $fila["preciocompraproducto"] . "</td>";
   
   echo "</tr>";
}

?>  

</table>

</body>
</html>