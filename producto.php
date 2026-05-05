<?php
require("usarGestiona.php");
require("./utils/compruebaTipos.php");

$mensajeError = "";
$datosCorrectos = true;
$exito = true;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoproducto          = $_POST['codigoproducto'];
    $descripcionproducto     = $_POST['descripcionproducto'];
    $codigoproveedorproducto = $_POST['codigoproveedorproducto'];
    $preciocompraproducto    = $_POST['preciocompraproducto'];
    $precioventaproducto     = $_POST['precioventaproducto'];
    $stockproducto           = $_POST['stockproducto'];
     //Ací caldria fer la comprovació de les dades rebudes abans d'inserir-les a la bd
     
     // Caldria comprovar que el codi de producte no existeix ja a la bbdd ni que el codi de proveïdor existeix a la bbdd
    if(estaVacio($descripcionproducto)) {$mensajeError .= "La descripción no puede estar vacía.<br>";  $datosCorrectos=false;  $datosCorrectos=false;}
    if(!esFloatPositivo($preciocompraproducto)) {$mensajeError .= "El precio de compra debe ser un valor positivo.<br>";  $datosCorrectos=false;}
    if(!esFloatPositivo($precioventaproducto)) {$mensajeError .= "El precio de venta debe ser un valor positivo.<br>";  $datosCorrectos=false;}
    if(!esEntero($stockproducto)) {$mensajeError .= "El stock debe ser un número entero.<br>";  $datosCorrectos=false;}
//Si totes les dades són correctes, s'insertaran a la bd, sino es mostrarà un missatge d'error i no s'inserirà a la bd
    if($datosCorrectos) {
        $consulta = "INSERT INTO Nuevosproductos VALUES
        ('$codigoproducto','$descripcionproducto','$codigoproveedorproducto','$preciocompraproducto','$precioventaproducto','$stockproducto')";

        if (!$mysqli->query($consulta)) {
            die("Error producto: " . $mysqli->error);
        }

        echo "<p>Producto insertado correctamente</p>";
        echo "<form method=\"POST\">";
        echo "<button type=\"button\" onclick=\"window.location.href='./panel.html'\">Continuar</button>";
        echo "</form>";
       
    } else {
        echo "<p> Error al insertar producto:<br>$mensajeError</p>";
        echo "<p>Por favor, corrige los errores y vuelve a intentarlo.</p>";

    
        echo "<form method=\"POST\">";
        echo "<hidenput type=\"text\" name=\"codigoproducto\" value=\"$codigoproducto\">";
        echo "<hidenput type=\"text\" name=\"descripcionproducto\" value=\"$descripcionproducto\">";
        echo "<hidenput type=\"text\" name=\"codigoproveedorproducto\" value=\"$codigoproveedorproducto\">";
        echo "<hidenput type=\"text\" name=\"preciocompraproducto\" value =\"$preciocompraproducto\">";
        echo "<hidenput type=\"text\" name=\"precioventaproducto\" value=\"$precioventaproducto\">";
        echo "<hidenput type=\"text\" name  =\"stockproducto\" value=\"$stockproducto\">";

        
        echo "<button type=\"button\" onclick=\"window.location.href='./Gestionarproductos.html'\">Corregir Errores</button>";
        echo "</form>";
 
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado — Sistema CRUD</title>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #0a0a0f; --surface: #111118; --border: #1e1e2e;
      --accent: #00e5ff; --accent2: #ff3c6e; --text: #e8e8f0; --muted: #5a5a7a;
      --green: #7fff7f;
      --mono: 'Space Mono', monospace; --sans: 'Syne', sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: var(--sans); min-height: 100vh; }

    .topline {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--accent), var(--accent2), transparent);
      animation: shimmer 3s ease-in-out infinite;
    }
    @keyframes shimmer { 0%,100%{opacity:.6} 50%{opacity:1} }

    header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 28px 48px; border-bottom: 1px solid var(--border);
    }
    .logo { display: flex; align-items: baseline; gap: 12px; }
    .logo-tag {
      font-family: var(--mono); font-size: 10px; color: var(--accent);
      letter-spacing: 3px; border: 1px solid var(--accent); padding: 3px 8px;
    }
    .logo h1 { font-size: 22px; font-weight: 800; letter-spacing: -0.5px; }

    main {
      padding: 56px 48px;
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      min-height: calc(100vh - 90px);
    }

    .result-box {
      border: 1px solid var(--border);
      background: var(--surface);
      padding: 40px 48px;
      max-width: 580px;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 28px;
    }

    .status-icon { font-size: 48px; line-height: 1; }

    .status-label {
      font-family: var(--mono); font-size: 10px;
      letter-spacing: 4px; text-transform: uppercase;
    }
    .status-label.success { color: var(--green); }
    .status-label.error   { color: var(--accent2); }

    .status-msg {
      font-family: var(--mono); font-size: 13px;
      color: var(--text); text-align: center; line-height: 2;
      border-top: 1px solid var(--border);
      padding-top: 24px; width: 100%;
    }
    .status-msg.error { color: var(--accent2); }

    /* Detalle del producto insertado */
    .detail-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 16px 32px;
      width: 100%; border-top: 1px solid var(--border); padding-top: 24px;
    }
    .detail-field { display: flex; flex-direction: column; gap: 6px; }
    .field-label { font-family: var(--mono); font-size: 10px; color: var(--muted); letter-spacing: 2px; text-transform: uppercase; }
    .field-value { font-family: var(--mono); font-size: 13px; color: var(--text); }

    .btn-row { display: flex; gap: 12px; margin-top: 8px; flex-wrap: wrap; justify-content: center; }

    .btn {
      font-family: var(--mono); font-size: 12px;
      background: transparent; border: 1px solid;
      padding: 10px 24px; cursor: pointer;
      letter-spacing: 1px; text-decoration: none;
      transition: background 0.2s, color 0.2s;
      display: inline-block;
    }
    .btn-primary { border-color: var(--accent);  color: var(--accent);  }
    .btn-primary:hover { background: var(--accent);  color: var(--bg); }
    .btn-secondary { border-color: var(--muted); color: var(--muted); }
    .btn-secondary:hover { background: var(--muted); color: var(--bg); }
  </style>
</head>
<body>

<div class="topline"></div>

<header>
  <div class="logo">
    <span class="logo-tag">03</span>
    <h1>Gestionar Productos</h1>
  </div>
</header>

<main>
  <div class="result-box">

    <?php if ($exito): ?>

      <div class="status-icon">✓</div>
      <div class="status-label success">producto insertado</div>
      <div class="status-msg">
        El producto <strong><?= htmlspecialchars($codigoproducto) ?></strong>
        ha sido registrado correctamente.
      </div>

      <div class="detail-grid">
        <div class="detail-field">
          <div class="field-label">Código</div>
          <div class="field-value"><?= htmlspecialchars($codigoproducto) ?></div>
        </div>
        <div class="detail-field">
          <div class="field-label">Descripción</div>
          <div class="field-value"><?= htmlspecialchars($descripcionproducto) ?></div>
        </div>
        <div class="detail-field">
          <div class="field-label">Proveedor</div>
          <div class="field-value"><?= htmlspecialchars($codigoproveedorproducto) ?></div>
        </div>
        <div class="detail-field">
          <div class="field-label">Precio compra</div>
          <div class="field-value"><?= htmlspecialchars($preciocompraproducto) ?> €</div>
        </div>
        <div class="detail-field">
          <div class="field-label">Precio venta</div>
          <div class="field-value"><?= htmlspecialchars($precioventaproducto) ?> €</div>
        </div>
        <div class="detail-field">
          <div class="field-label">Stock</div>
          <div class="field-value"><?= htmlspecialchars($stockproducto) ?> uds.</div>
        </div>
      </div>

      <div class="btn-row">
        <a class="btn btn-primary" href="panel.html">→ Volver al panel</a>
      </div>

    <?php else: ?>

      <div class="status-icon">✕</div>
      <div class="status-label error">error en la operación</div>
      <div class="status-msg error"><?= $mensajeError ?></div>

      <div class="btn-row">
        <a class="btn btn-primary"    href="GestionarProductos.html">← Corregir errores</a>
        <a class="btn btn-secondary"  href="panel.html">Volver al panel</a>
      </div>

    <?php endif; ?>

  </div>
</main>

</body>
</html>
