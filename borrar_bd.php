<?php
$mysqli = new mysqli("localhost","root","");

$mysqli->query("DROP DATABASE IF EXISTS NuevaDB");

header("Location: index.html");
exit;
?>