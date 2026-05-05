<?php
require("usarGestiona.php");

$mensaje = "";
$exito=true;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoproveedor    = $_POST['codigoproveedor'];
    $nombreproveedor    = $_POST['nombreproveedor'];
    $direccionproveedor = $_POST['direccionproveedor'];
    $telefonoproveedor  = $_POST['telefonoproveedor'];
    $ciudadproveedor    = $_POST['ciudadproveedor'];
    $provinciaproveedor = $_POST['provinciaproveedor'];
    $emailproveedor     = $_POST['emailproveedor'];

    $consulta = "INSERT INTO Nuevosproveedores VALUES
    ('$codigoproveedor','$nombreproveedor','$direccionproveedor','$telefonoproveedor','$ciudadproveedor','$provinciaproveedor','$emailproveedor')";
 //echo $consulta;
    if (!$mysqli->query($consulta)) { $exito=false;
        $mensaje = "<div class='alert error'> Error: " . $mysqli->error . "</div>";
    } else {
        $exito=true;
        $mensaje = "<div class='alert success'> Proveedor insertado correctamente</div>";
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
      max-width: 560px;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 28px;
    }

    .status-icon {
      font-size: 48px;
      line-height: 1;
    }

    .status-label {
      font-family: var(--mono);
      font-size: 10px;
      letter-spacing: 4px;
      text-transform: uppercase;
    }
    .status-label.success { color: var(--green); }
    .status-label.error   { color: var(--accent2); }

    .status-msg {
      font-family: var(--mono);
      font-size: 13px;
      color: var(--text);
      text-align: center;
      line-height: 1.8;
      border-top: 1px solid var(--border);
      padding-top: 24px;
      width: 100%;
    }
    .status-msg.error { color: var(--accent2); }

    .btn-volver {
      font-family: var(--mono); font-size: 12px;
      background: transparent; border: 1px solid var(--accent);
      color: var(--accent); padding: 10px 24px;
      cursor: pointer; letter-spacing: 1px;
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
      margin-top: 8px;
    }
    .btn-volver:hover { background: var(--accent); color: var(--bg); }
  </style>
</head>
<body>

<div class="topline"></div>

<header>
  <div class="logo">
    <span class="logo-tag">02</span>
    <h1>Info Proveedores</h1>
  </div>
</header>

<main>
  <div class="result-box">

    <?php if ($exito): ?>
      <div class="status-icon">✓</div>
      <div class="status-label success">operación completada</div>
      <div class="status-msg"><?= $mensaje ?></div>

    <?php else: ?>
      <div class="status-icon">✕</div>
      <div class="status-label error">error en la operación</div>
      <div class="status-msg error"><?= htmlspecialchars($mensaje) ?></div>

    <?php endif; ?>

    <a class="btn-volver" href="VerProveedores.html">→ Ver Proveedores</a>

  </div>
</main>

</body>
</html>