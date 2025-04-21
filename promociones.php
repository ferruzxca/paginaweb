<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/conexion.php';

$stmt = $pdo->prepare("SELECT * FROM mpromociones WHERE activa = 1 ORDER BY FIELD(dia, 'viernes', 'sabado'), id ASC");
$stmt->execute();
$promociones = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Promociones | La Máscara</title>
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

    .promo-header {
      background-image: url('images/backgrounds/promos.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 30px;
      text-align: center;
      color: white;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
    }

    .promo-header h1 {
      font-size: 60px;
      margin-bottom: 15px;
    }

    .promo-header p {
      font-size: 20px;
    }

    .promo-section {
      max-width: 1200px;
      margin: auto;
      padding: 60px 20px;
    }

    .promo-section h2 {
      text-align: center;
      color: var(--azul-talavera);
      margin-bottom: 40px;
      font-size: 32px;
    }

    .promo-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
    }

    .promo-card {
      background-color: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
      transition: transform 0.4s ease;
      border: 3px solid var(--verde-salsa);
    }

    .promo-card:hover {
      transform: translateY(-5px) scale(1.02);
    }

    .promo-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-bottom: 1px solid #ddd;
    }

    .promo-content {
      padding: 20px;
      text-align: center;
    }

    .promo-content h3 {
      color: var(--rosa-mexicano);
      font-size: 22px;
      margin-bottom: 10px;
    }

    .promo-content p {
      color: #555;
      font-size: 15px;
    }

    .badge-dia {
      display: inline-block;
      padding: 5px 15px;
      font-size: 13px;
      font-weight: bold;
      background-color: var(--amarillo-maiz);
      color: var(--azul-talavera);
      border-radius: 50px;
      margin-bottom: 10px;
    }

    /* WhatsApp button */
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

<!-- Cabecera de promociones -->
<div class="promo-header">
  <h1>Promociones</h1>
  <p>Aprovecha nuestras promociones especiales de Viernes y Sábado</p>
</div>

<!-- Sección de tarjetas -->
<div class="promo-section">
  <h2>Ofertas Especiales</h2>
  <div class="promo-grid">
    <?php foreach ($promociones as $promo): ?>
      <div class="promo-card">
        <img src="<?= htmlspecialchars($promo['imagen']) ?>" alt="<?= htmlspecialchars($promo['titulo']) ?>" onerror="this.onerror=null;this.src='images/promociones/default.jpg';">
        <div class="promo-content">
          <div class="badge-dia"><?= ucfirst($promo['dia']) ?></div>
          <h3><?= htmlspecialchars($promo['titulo']) ?></h3>
          <p><?= htmlspecialchars($promo['descripcion']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/525644115556" class="whatsapp-float" target="_blank" title="¡Contáctanos por WhatsApp!">
  <img src="images/whatsapp_logo.png" alt="WhatsApp">
</a>

<?php include('includes/footer.php'); ?>

</body>
</html>
