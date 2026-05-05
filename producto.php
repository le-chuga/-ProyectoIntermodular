<?php
require("usarGestiona.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoproducto          = $_POST['codigoproducto'];
    $descripcionproducto     = $_POST['descripcionproducto'];
    $codigoproveedorproducto = $_POST['codigoproveedorproducto'];
    $preciocompraproducto    = $_POST['preciocompraproducto'];
    $precioventaproducto     = $_POST['precioventaproducto'];
    $stockproducto           = $_POST['stockproducto'];

    $consulta = "INSERT INTO Nuevosproductos VALUES
    ('$codigoproducto','$descripcionproducto','$codigoproveedorproducto','$preciocompraproducto','$precioventaproducto','$stockproducto')";

    if (!$mysqli->query($consulta)) {
        die("Error producto: " . $mysqli->error);
    }

    echo "<p> Producto insertado correctamente</p>";
}
?>

