<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$servidor="localhost";
$usuario="root";
$clave="";

@$mysqli= new mysqli($servidor,$usuario,$clave);
if ($mysqli->connect_errno)
{
    echo "<br>Fallo al conectar a Mysql: ".$mysqli->connect_error." ".$mysqli->connect_errno;
    die ("<br> Salida del programa. Falt Error");

}
else 
    echo "Te has conectado al servidor MYSQL";

$basedatos="gestiona";
if ($mysqli->select_db($basedatos)) /* True si todo va bien*/
{
    echo "<br> BD seleccionada";
}
else die ("Error grave. BD no seleccionada");

$consulta="CREATE TABLE IF NOT EXISTS proveedores ";
$consulta.="(codigoproveedor CHAR(3),";
$consulta.="nombreproveedor VARCHAR(40), ";
$consulta.="direccionproveedor VARCHAR(80), ";
$consulta.="telefonoproveedor VARCHAR(9), ";
$consulta.="ciudadproveedor VARCHAR(40), ";
$consulta.="provinciaproveedor VARCHAR(20), ";
$consulta.="emailproveedor VARCHAR(80), ";
$consulta.="PRIMARY KEY (codigoproveedor)); ";
if (!@$mysqli->query($consulta)) 
/* false fallo query, true si ok */
{
   echo "Lo sentinmos. Aplicación no funciona<br>"   ;
   echo "error en la consulta $consulta <br>";
   echo "Num.error: ".$mysqli->errno."<br>";
   echo "Error: ".$mysqli->error."<br>";
   exit;
}
else echo "<br> TABLA creada con éxito";

$consulta="CREATE TABLE IF NOT EXISTS productos ";
$consulta.="(codigoproducto CHAR(3),";
$consulta.="descripcionproducto VARCHAR(50), ";
$consulta.="codigoproveedorproducto CHAR(3), ";
$consulta.="preciocompraproducto float, ";
$consulta.="precioventaproducto float, ";
$consulta.="stockproducto int(11), ";
$consulta.="PRIMARY KEY (codigoproducto), FOREIGN KEY (codigoproveedorproducto) REFERENCES proveedores(codigoproveedor));";

if (!@$mysqli->query($consulta)) 
/* false fallo query, true si ok */
{
   echo "Lo sentinmos. Aplicación no funciona<br>"   ;
   echo "error en la consulta $consulta <br>";
   echo "Num.error: ".$mysqli->errno."<br>";
   echo "Error: ".$mysqli->error."<br>";
   exit;
}
else echo "<br> TABLA creada con éxito";

?>

