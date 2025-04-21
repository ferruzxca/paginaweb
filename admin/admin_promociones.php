<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

$stmt = $pdo->prepare("SELECT * FROM promociones ORDER BY id DESC");
$stmt->execute();
$promos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Promociones | Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
  <style>
    :root {
      --rosa-mexicano: #e2007a;
      --verde-salsa: #27ae60;
      --rojo-chile: #c0392b;
      --amarillo-maiz: #f1c40f;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fffaf5;
      margin: 0;
      padding: 0;
    }
    .admin-container {
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
    }
    .volver-panel {
      text-align: center;
      margin-bottom: 30px;
    }
    .volver-panel a {
      background-color: var(--amarillo-maiz);
      padding: 14px 30px;
      border-radius: 8px;
      font-weight: bold;
      color: #2c3e50;
      text-decoration: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .volver-panel a:hover {
      background-color: var(--verde-salsa);
      color: white;
    }
    h1 {
      color: #34495e;
      text-align: center;
      margin-bottom: 30px;
    }
    .btn-agregar {
      background-color: var(--rosa-mexicano);
      color: white;
      padding: 12px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      margin-bottom: 20px;
      display: inline-block;
    }
    .btn-agregar:hover { background-color: var(--rojo-chile); }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: var(--amarillo-maiz);
      color: #2c3e50;
    }

    td img {
      width: 60px;
      height: 40px;
      object-fit: cover;
      border-radius: 4px;
    }

    .acciones a {
      margin: 0 5px;
      padding: 6px 10px;
      border-radius: 4px;
      color: white;
      text-decoration: none;
      font-size: 14px;
    }

    .edit { background-color: var(--verde-salsa); }
    .deactivate { background-color: var(--rojo-chile); }
    .activate { background-color: var(--amarillo-maiz); color: black; }
  </style>
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="admin-container">

  <div class="volver-panel">
    <a href="dashboard.php">⬅️ Volver al Panel</a>
  </div>

  <h1>Gestión de Promociones</h1>

  <a href="agregar_promocion.php" class="btn-agregar">+ Agregar Promoción</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Día</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($promos as $promo): ?>
        <tr>
          <td><?= $promo['id'] ?></td>
          <td><img src="../<?= $promo['imagen'] ?>" alt="<?= $promo['titulo'] ?>"></td>
          <td><?= htmlspecialchars($promo['titulo']) ?></td>
          <td><?= htmlspecialchars($promo['descripcion']) ?></td>
          <td><?= ucfirst($promo['dia']) ?></td>
          <td><?= $promo['activa'] ? 'Activa' : 'Inactiva' ?></td>
          <td class="acciones">
            <a href="editar_promocion.php?id=<?= $promo['id'] ?>" class="edit">Editar</a>
            <?php if ($promo['activa']): ?>
              <a href="desactivar_promocion.php?id=<?= $promo['id'] ?>" class="deactivate">Desactivar</a>
            <?php else: ?>
              <a href="activar_promocion.php?id=<?= $promo['id'] ?>" class="activate">Activar</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
