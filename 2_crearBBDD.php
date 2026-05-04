<?php
require("usarGestiona.php");

$consulta = "CREATE DATABASE IF NOT EXISTS NuevaDB";

if (!$mysqli->query($consulta)) {
    die("Error BD: " . $mysqli->error);
}

echo "BD creada";
?>