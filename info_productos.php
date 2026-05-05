<?php
require("db.php");

$result = $mysqli->query("SELECT * FROM Nuevosproductos");
?>

<table border="1">
<tr>
<th>Código</th><th>Descripción</th><th>Proveedor</th><th>Compra</th><th>Venta</th><th>Stock</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
<td><?= $row['codigoproducto'] ?></td>
<td><?= $row['descripcionproducto'] ?></td>
<td><?= $row['codigoproveedorproducto'] ?></td>
<td><?= $row['preciocompraproducto'] ?></td>
<td><?= $row['precioventaproducto'] ?></td>
<td><?= $row['stockproducto'] ?></td>
</tr>
<?php } ?>
</table>