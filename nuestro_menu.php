<?php
require_once 'includes/conexion.php';

// Obtener los tacos por categoría
$stmtPremium = $pdo->prepare("SELECT * FROM menu WHERE categoria = 'Premium' AND activo = 1");
$stmtPremium->execute();
$premium = $stmtPremium->fetchAll();

$stmtGuisado = $pdo->prepare("SELECT * FROM menu WHERE categoria = 'Guisado' AND activo = 1");
$stmtGuisado->execute();
$guisados = $stmtGuisado->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú | La Máscara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="layout/styles/layout.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --rosa-mexicano: #e2007a;
      --rojo-chile: #c0392b;
      --amarillo-maiz: #f1c40f;
      --verde-salsa: #27ae60;
      --azul-talavera: #34495e;
      --blanco-crema: #fefefe;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fffaf5;
      margin: 0;
      padding: 0;
    }

    .menu-header {
      background-image: url('images/backgrounds/textil_mexicano.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 30px;
      text-align: center;
      color: white;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    }

    .menu-header h1 {
      font-size: 60px;
      margin-bottom: 10px;
    }

    .menu-header p {
      font-size: 20px;
    }

    .seccion {
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .seccion h2 {
      color: var(--azul-talavera);
      font-size: 36px;
      text-align: center;
      margin-bottom: 40px;
    }

    .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
    }

    .card {
      background: white;
      border: 3px solid var(--amarillo-maiz);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card .contenido {
      padding: 20px;
      text-align: center;
    }

    .card h3 {
      margin: 0 0 10px;
      color: var(--rosa-mexicano);
      font-size: 20px;
    }

    .card p {
      font-size: 15px;
      color: #555;
    }

    .card strong {
      color: var(--rojo-chile);
      display: block;
      margin-top: 10px;
      font-size: 18px;
    }

    /* Botón WhatsApp */
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
      background-color: var(--verde-salsa);
      border-radius: 50%;
      padding: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      transition: transform 0.3s ease;
    }

    .whatsapp-float:hover {
      transform: scale(1.1);
    }

    .whatsapp-float img {
      width: 50px;
      height: 50px;
    }
  </style>
</head>
<body>

<?php include('includes/navbar.php'); ?>

<div class="menu-header">
  <h1>Nuestro Menú</h1>
  <p>Explora nuestra variedad de tacos, ¡todos preparados con amor y tradición!</p>
</div>

<section class="seccion">
  <h2>Tacos Premium</h2>
  <div class="galeria">
    <?php foreach ($premium as $taco): ?>
      <div class="card">
        <img src="<?= $taco['imagen'] ?>" alt="<?= htmlspecialchars($taco['nombre']) ?>">
        <div class="contenido">
          <h3><?= htmlspecialchars($taco['nombre']) ?></h3>
          <p><?= htmlspecialchars($taco['descripcion']) ?></p>
          <strong>$<?= number_format($taco['precio'], 2) ?></strong>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="seccion" style="background-color: #f9f9f9;">
  <h2>Tacos de Guisado</h2>
  <div class="galeria">
    <?php foreach ($guisados as $taco): ?>
      <div class="card">
        <img src="<?= $taco['imagen'] ?>" alt="<?= htmlspecialchars($taco['nombre']) ?>">
        <div class="contenido">
          <h3><?= htmlspecialchars($taco['nombre']) ?></h3>
          <p><?= htmlspecialchars($taco['descripcion']) ?></p>
          <strong>$<?= number_format($taco['precio'], 2) ?></strong>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/525644115556" class="whatsapp-float" target="_blank" title="¡Contáctanos por WhatsApp!">
  <img src="images/whatsapp_logo.png" alt="WhatsApp">
</a>

<?php include('includes/footer.php'); ?>

</body>
</html>
