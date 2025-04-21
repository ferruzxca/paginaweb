<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fefefe;
      margin: 0;
      padding: 0;
    }

    .dashboard-container {
      padding: 80px 20px;
      text-align: center;
    }

    .dashboard-container h1 {
      margin-bottom: 40px;
      color: #2c3e50;
    }

    .dashboard-links {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
    }

    .card-link {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 12px;
      text-decoration: none;
      color: #2c3e50;
      font-size: 18px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
      width: 260px;
    }

    .card-link:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      background-color: #fef9f9;
    }

    .card-link i {
      font-size: 30px;
      margin-bottom: 10px;
      color: #e2007a;
    }

    @media screen and (max-width: 600px) {
      .card-link {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="dashboard-container">
  <h1>Bienvenido, <?= htmlspecialchars($_SESSION['admin_user']) ?> 👋</h1>

  <div class="dashboard-links">
    <a class="card-link" href="admin_menu.php">
      <i class="fas fa-utensils"></i><br>
      Gestionar Menú
    </a>
    <a class="card-link" href="admin_promociones.php">
      <i class="fas fa-tags"></i><br>
      Gestionar Promociones
    </a>
    <a class="card-link" href="logout.php">
      <i class="fas fa-sign-out-alt"></i><br>
      Cerrar Sesión
    </a>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
<script src="https://kit.fontawesome.com/4c28d8ec18.js" crossorigin="anonymous"></script>
</body>
</html>
