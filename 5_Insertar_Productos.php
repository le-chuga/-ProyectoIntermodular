<?php
require("usarGestiona.php");

$cod = $_REQUEST['codigoproducto'];
$des = $_REQUEST['descripcionproducto'];
$pro = $_REQUEST['codigoproveedorproducto'];
$pc  = $_REQUEST['preciocompraproducto'];
$pv  = $_REQUEST['precioventaproducto'];
$stk = $_REQUEST['stockproducto'];

$consulta = "INSERT INTO Nuevosproductos VALUES
('$cod','$des','$pro','$pc','$pv','$stk')";

if (!$mysqli->query($consulta)) {
    die("Error producto: " . $mysqli->error);
}

echo "Producto insertado";
?>