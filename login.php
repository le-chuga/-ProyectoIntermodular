<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$servidor = $_POST['servidor'];
$usuario  = $_POST['usuario'];
$clave    = $_POST['clave'];

$mysqli = new mysqli($servidor, $usuario, $clave);

if ($mysqli->connect_errno) {
    die("Error conexión: " . $mysqli->connect_error);
}

echo "Conectado correctamente";

header("Location: panel.html");
exit;
?>