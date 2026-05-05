<?php
require("db.php");

$result = $mysqli->query("SELECT * FROM Nuevosproveedores");
?>

<table border="1">
<tr>
<th>Código</th><th>Nombre</th><th>Dirección</th><th>Tel</th><th>Ciudad</th><th>Provincia</th><th>Email</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?= $row['codigoproveedor'] ?></td>
<td><?= $row['nombreproveedor'] ?></td>
<td><?= $row['direccionproveedor'] ?></td>
<td><?= $row['telefonoproveedor'] ?></td>
<td><?= $row['ciudadproveedor'] ?></td>
<td><?= $row['provinciaproveedor'] ?></td>
<td><?= $row['emailproveedor'] ?></td>
</tr>
<?php } ?>
</table>