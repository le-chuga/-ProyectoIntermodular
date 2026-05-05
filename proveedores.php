<?php
require("usarGestiona.php");

$mensaje = "";

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

    if (!$mysqli->query($consulta)) {
        $mensaje = "<div class='alert error'>❌ Error: " . $mysqli->error . "</div>";
    } else {
        $mensaje = "<div class='alert success'>✅ Proveedor insertado correctamente</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Proveedores — Sistema CRUD</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0a0a0f; --surface: #111118; --border: #1e1e2e;
    --accent: #00e5ff; --accent2: #ff3c6e; --text: #e8e8f0; --muted: #5a5a7a;
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
  .back {
    font-family: var(--mono); font-size: 11px; color: var(--muted);
    text-decoration: none; letter-spacing: 1px; transition: color 0.2s;
  }
  .back:hover { color: var(--accent); }

  main { padding: 56px 48px; max-width: 680px; margin: 0 auto; }

  .section-label {
    font-family: var(--mono); font-size: 10px; color: var(--muted);
    letter-spacing: 4px; text-transform: uppercase; margin-bottom: 32px;
    display: flex; align-items: center; gap: 16px;
  }
  .section-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }

  .field { margin-bottom: 20px; }
  label {
    display: block; font-family: var(--mono); font-size: 10px;
    color: var(--muted); letter-spacing: 2px; text-transform: uppercase; margin-bottom: 8px;
  }
  input {
    width: 100%; background: var(--surface); border: 1px solid var(--border);
    color: var(--text); font-family: var(--mono); font-size: 13px;
    padding: 14px 16px; outline: none; transition: border-color 0.2s ease;
  }
  input:focus { border-color: var(--accent); }
  input::placeholder { color: var(--muted); }

  .row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

  .btn {
    margin-top: 32px; padding: 16px 40px; background: var(--accent);
    color: var(--bg); border: none; font-family: var(--mono); font-size: 12px;
    font-weight: 700; letter-spacing: 3px; text-transform: uppercase;
    cursor: pointer; position: relative; overflow: hidden; transition: all 0.3s ease;
  }
  .btn::before {
    content: ''; position: absolute; inset: 0; background: var(--accent2);
    transform: scaleX(0); transform-origin: right; transition: transform 0.3s ease;
  }
  .btn:hover::before { transform: scaleX(1); }
  .btn span { position: relative; z-index: 1; }

  .alert {
    padding: 16px 20px; margin-bottom: 32px;
    font-family: var(--mono); font-size: 12px; letter-spacing: 1px;
  }
  .alert.success { background: rgba(0,229,255,0.1); border-left: 3px solid var(--accent); color: var(--accent); }
  .alert.error   { background: rgba(255,60,110,0.1); border-left: 3px solid var(--accent2); color: var(--accent2); }
</style>
</head>
<body>
<div class="topline"></div>
<header>
  <div class="logo">
    <span class="logo-tag">04</span>
    <h1>Gestionar Proveedores</h1>
  </div>
  <a class="back" href="panel.html">← Volver al panel</a>
</header>
<main>
  <div class="section-label">nuevo proveedor</div>
  <?= $mensaje ?>
  <form method="POST">
    <div class="row">
      <div class="field">
        <label>Código</label>
        <input name="codigoproveedor" placeholder="ej: P01" maxlength="3" required>
      </div>
      <div class="field">
        <label>Nombre</label>
        <input name="nombreproveedor" placeholder="Nombre del proveedor" required>
      </div>
    </div>
    <div class="field">
      <label>Dirección</label>
      <input name="direccionproveedor" placeholder="Calle, número...">
    </div>
    <div class="row">
      <div class="field">
        <label>Ciudad</label>
        <input name="ciudadproveedor" placeholder="Ciudad">
      </div>
      <div class="field">
        <label>Provincia</label>
        <input name="provinciaproveedor" placeholder="Provincia">
      </div>
    </div>
    <div class="row">
      <div class="field">
        <label>Teléfono</label>
        <input name="telefonoproveedor" placeholder="000000000" maxlength="9">
      </div>
      <div class="field">
        <label>Email</label>
        <input name="emailproveedor" placeholder="correo@ejemplo.com" type="email">
      </div>
    </div>
    <button class="btn" type="submit"><span>→ Guardar proveedor</span></button>
  </form>
</main>
</body>
</html>