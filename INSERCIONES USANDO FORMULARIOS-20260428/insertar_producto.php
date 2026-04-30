
<?php

require ("usarGESTIONa.php");

$codigo=$_REQUEST["codigo"];
$descripcion=$_REQUEST["descripcion"];
$proveedor=$_REQUEST["proveedor"];
$preciocompra = $_REQUEST["preciocompra"];
$precioventa = $_REQUEST["precioventa"];
$stock = $_REQUEST["stock"];

$consulta ="INSERT INTO productos (codigoproducto, descripcionproducto,codigoproveedorproducto,preciocompraproducto,precioventaproducto,stockproducto) VALUES ('$codigo','$descripcion','$proveedor','$preciocompra','$precioventa','$stock');";

if (!$resultado=$mysqli->query($consulta))
  {echo "Lo sentimos. La Aplicación no funciona<br>";
   echo "Error. en la consulta: ".$consulta."<br>";
   echo "Num.error: ".$mysqli->errno."<br>";
   echo "Error: ".$mysqli->error. "<br>";
   exit;
  } 
else echo ("Producto Insertado");


?>
