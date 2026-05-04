<?php
require("usarGestiona.php");

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

if (!$mysqli->query($consulta)) die($mysqli->error);

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

if (!$mysqli->query($consulta)) die($mysqli->error);

echo "Tablas creadas";
?>