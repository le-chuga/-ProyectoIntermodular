<?php

require("usargestiona.php");
$codprov=$_REQUEST['codprov'];
$nom=$_REQUEST['nombre'];
$direc=$_REQUEST['direc'];
$tlf=$_REQUEST['tlf'];
$ciudad=$_REQUEST['ciudad'];
$prov=$_REQUEST['prov'];
$mail=$_REQUEST['mail'];
$consulta="INSERT INTO proveedores (codigoProveedor,nombreProveedor,direccionProveedor,telefonoProveedor,ciudadProveedor,provinciaProveedor,emailProveedor) VALUES ('$codprov','$nom','$direc','$tlf','$ciudad','$prov','$mail');";

if (!@$mysqli->query($consulta)) 
/* false fallo query, true si ok */
{
   echo "Lo sentinmos. Aplicación no funciona<br>"   ;
   echo "error en la consulta $consulta <br>";
   echo "Num.error: ".$mysqli->errno."<br>";
   echo "Error: ".$mysqli->error."<br>";
   exit;
}
else echo "<br>PROVEEDOR insertado";
?>  


