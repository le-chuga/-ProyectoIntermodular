<?php
require("usarGestiona.php");
header('Content-Type: application/json');

$codigo = trim($_POST['codigoproducto'] ?? '');

if ($codigo === '') {
    echo json_encode(['ok' => false, 'error' => 'Código vacío']);
    exit;
}

$stmt = $mysqli->prepare("DELETE FROM Nuevosproductos WHERE codigoproducto = ?");
$stmt->bind_param("s", $codigo);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['ok' => true, 'msg' => 'Producto eliminado correctamente']);
    } else {
        echo json_encode(['ok' => false, 'error' => 'Producto no encontrado']);
    }
} else {
    echo json_encode(['ok' => false, 'error' => 'Error al eliminar: ' . $mysqli->error]);
}
?>