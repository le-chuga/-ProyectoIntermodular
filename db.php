<?php
$mysqli = new mysqli("localhost","root","","NuevaDB");

if ($mysqli->connect_errno) {
    die("Error conexión");
}
?>