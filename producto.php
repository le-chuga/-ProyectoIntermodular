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

    echo "<p>✅ Producto insertado correctamente</p>";
}
?>

<h2>Gestionar Producto</h2>
<form method="POST">
    <input name="codigoproducto" placeholder="Código producto" required><br>
    <input name="descripcionproducto" placeholder="Descripción" required><br>
    <input name="codigoproveedorproducto" placeholder="Código proveedor" required><br>
    <input name="preciocompraproducto" placeholder="Precio compra" type="number" step="0.01"><br>
    <input name="precioventaproducto" placeholder="Precio venta" type="number" step="0.01"><br>
    <input name="stockproducto" placeholder="Stock" type="number"><br>
    <button type="submit">Guardar</button>
</form>
