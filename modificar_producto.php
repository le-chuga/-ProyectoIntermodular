<?php
require("usarGestiona.php");
header('Content-Type: application/json');

// Comprueba que llegan los datos
if (empty($_POST)) {
    echo json_encode(['ok' => false, 'error' => 'No se recibió ningún dato POST']);
    exit;
}

$codigo       = trim($_POST['codigoproducto']           ?? '');
$descripcion  = trim($_POST['descripcionproducto']      ?? '');
$proveedor    = trim($_POST['codigoproveedorproducto']  ?? '');
$precioCompra = floatval($_POST['preciocompraproducto'] ?? 0);
$precioVenta  = floatval($_POST['precioventaproducto']  ?? 0);
$stock        = intval($_POST['stockproducto']          ?? 0);

// Comprueba que $mysqli existe
if (!isset($mysqli) || !$mysqli) {
    echo json_encode(['ok' => false, 'error' => 'Sin conexión a BD']);
    exit;
}

$stmt = $mysqli->prepare("
    UPDATE Nuevosproductos 
    SET descripcionproducto     = ?,
        codigoproveedorproducto = ?,
        preciocompraproducto    = ?,
        precioventaproducto     = ?,
        stockproducto           = ?
    WHERE codigoproducto = ?
");

if (!$stmt) {
    echo json_encode(['ok' => false, 'error' => 'Error prepare: ' . $mysqli->error]);
    exit;
}

$stmt->bind_param("ssddis", $descripcion, $proveedor, $precioCompra, $precioVenta, $stock, $codigo);

if ($stmt->execute()) {
    echo json_encode(['ok' => true, 'msg' => 'Producto actualizado correctamente']);
} else {
    echo json_encode(['ok' => false, 'error' => 'Error execute: ' . $stmt->error]);
}
?>