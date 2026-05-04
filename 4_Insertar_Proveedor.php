<?php
require("usarGestiona.php");

$cod = $_POST['codigoproveedor'];
$nom = $_POST['nombreproveedor'];
$dir = $_POST['direccionproveedor'];
$tlf = $_POST['telefonoproveedor'];
$ciu = $_POST['ciudadproveedor'];
$pro = $_POST['provinciaproveedor'];
$ema = $_POST['emailproveedor'];

$consulta = "INSERT INTO Nuevosproveedores VALUES
('$cod','$nom','$dir','$tlf','$ciu','$pro','$ema')";

if (!$mysqli->query($consulta)) {
    die("Error proveedor: " . $mysqli->error);
}

echo "Proveedor insertado";
?>