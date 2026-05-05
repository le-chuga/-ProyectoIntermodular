<?php
mysqli_report(MYSQLI_REPORT_ERROR);

// Conectar SIN seleccionar BD (aún no existe)
$mysqli = new mysqli("localhost", "root", "");

if ($mysqli->connect_errno) {
    die("Error conexión MySQL");
}

/* CREAR BD */
$consulta = "CREATE DATABASE IF NOT EXISTS NuevaDB";

if (!$mysqli->query($consulta)) {
    die("Error BD: " . $mysqli->error);
}

/* SELECCIONAR BD (ahora ya existe) */
$mysqli->select_db("NuevaDB");

/* PROVEEDORES */
$consulta = "CREATE TABLE IF NOT EXISTS Nuevosproveedores (
codigoproveedor CHAR(3) PRIMARY KEY,
nombreproveedor VARCHAR(40),
direccionproveedor VARCHAR(80),
telefonoproveedor VARCHAR(9),
ciudadproveedor VARCHAR(40),
provinciaproveedor VARCHAR(20),
emailproveedor VARCHAR(80)
)";

if (!$mysqli->query($consulta)) {
    die($mysqli->error);
}

/* PRODUCTOS */
$consulta = "CREATE TABLE IF NOT EXISTS Nuevosproductos (
codigoproducto CHAR(3) PRIMARY KEY,
descripcionproducto VARCHAR(50),
codigoproveedorproducto CHAR(3),
preciocompraproducto FLOAT,
precioventaproducto FLOAT,
stockproducto INT,
FOREIGN KEY (codigoproveedorproducto) REFERENCES Nuevosproveedores(codigoproveedor)
)";

if (!$mysqli->query($consulta)) {
    die($mysqli->error);
}

/* REDIRECCIÓN LIMPIA */
header("Location: login.html");
exit;
?>