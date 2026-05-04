<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$mysqli = new mysqli("localhost", "root", "");

if ($mysqli->connect_errno) {
    die("Error conexión MySQL");
}

if (!$mysqli->select_db("NuevaDB")) {
    die("No se pudo seleccionar la BD");
}
?>