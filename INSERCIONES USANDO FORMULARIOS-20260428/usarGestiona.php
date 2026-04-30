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

?>

