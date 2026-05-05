<?php
require("usarGestiona.php");
header('Content-Type: application/json');

$codigo = trim($_GET['codigo'] ?? '');

if ($codigo === '') {
    echo json_encode(['ok' => false, 'error' => 'Código vacío']);
    exit;
}

$stmt = $mysqli->prepare("SELECT * FROM Nuevosproveedores WHERE codigoproveedor = ?");
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();
$row    = $result->fetch_assoc();

if ($row) {
    echo json_encode(['ok' => true, 'data' => $row]);
} else {
    echo json_encode(['ok' => false, 'error' => 'Proveedor no encontrado']);
}
?>