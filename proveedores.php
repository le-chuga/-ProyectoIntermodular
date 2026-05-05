<?php
require("usarGestiona.php");

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoproveedor    = $_POST['codigoproveedor'];
    $nombreproveedor    = $_POST['nombreproveedor'];
    $direccionproveedor = $_POST['direccionproveedor'];
    $telefonoproveedor  = $_POST['telefonoproveedor'];
    $ciudadproveedor    = $_POST['ciudadproveedor'];
    $provinciaproveedor = $_POST['provinciaproveedor'];
    $emailproveedor     = $_POST['emailproveedor'];

    $consulta = "INSERT INTO Nuevosproveedores VALUES
    ('$codigoproveedor','$nombreproveedor','$direccionproveedor','$telefonoproveedor','$ciudadproveedor','$provinciaproveedor','$emailproveedor')";

    if (!$mysqli->query($consulta)) {
        $mensaje = "<div class='alert error'>❌ Error: " . $mysqli->error . "</div>";
    } else {
        $mensaje = "<div class='alert success'>✅ Proveedor insertado correctamente</div>";
    }
}
?>
