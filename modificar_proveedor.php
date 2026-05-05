<?php
require("usarGestiona.php");
header('Content-Type: application/json');

if (empty($_POST)) {
    echo json_encode(['ok' => false, 'error' => 'No se recibió ningún dato POST']);
    exit;
}

$codigoproveedor       = trim($_POST['codigoproveedor']           ?? '');
$nombreproveedor  = trim($_POST['nombreproveedor']      ?? '');
$direccionproveedor = trim($_POST['direccionproveedor'] ?? '');
$telefonoproveedor  = trim($_POST['telefonoproveedor']  ?? '');
$ciudadproveedor        = trim($_POST['ciudadproveedor']          ?? '');
$provinciaproveedor        = trim($_POST['provinciaproveedor']          ?? '');
$emailproveedor        = trim($_POST['emailproveedor']          ?? '');


if (!isset($mysqli) || !$mysqli) {
    echo json_encode(['ok' => false, 'error' => 'Sin conexión a BD']);
    exit;
}






$stmt = $mysqli->prepare("
    UPDATE Nuevosproveedores 
    SET nombreproveedor    =    ?,
        direccionproveedor =        ?,
        telefonoproveedor  =     ?,
        ciudadproveedor    = ?,
        provinciaproveedor = ?,
        emailproveedor     = ?
    WHERE codigoproveedor  = ?
");

if (!$stmt) {
    echo json_encode(['ok' => false, 'error' => 'Error prepare: ' . $mysqli->error]);
    exit;
}

$stmt->bind_param("sssssss", $nombreproveedor, $direccionproveedor, $telefonoproveedor, $ciudadproveedor, $provinciaproveedor, $emailproveedor, $codigoproveedor);

if ($stmt->execute()) {
    echo json_encode(['ok' => true, 'msg' => 'Proveedor actualizado correctamente']);
} else {
    echo json_encode(['ok' => false, 'error' => 'Error al actualizar: ' . $stmt->error]);
}
?>