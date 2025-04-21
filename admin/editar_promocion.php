<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM promociones WHERE id = ?");
$stmt->execute([$id]);
$promo = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $dia = $_POST['dia'];

    if (!empty($_FILES['imagen']['name'])) {
        $imagen = 'images/promociones/' . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], '../' . $imagen);
        $stmt = $pdo->prepare("UPDATE promociones SET titulo=?, descripcion=?, imagen=?, dia=? WHERE id=?");
        $stmt->execute([$titulo, $descripcion, $imagen, $dia, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE promociones SET titulo=?, descripcion=?, dia=? WHERE id=?");
        $stmt->execute([$titulo, $descripcion, $dia, $id]);
    }

    header("Location: admin_promociones.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Promoción</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --rosa-mexicano: #e2007a;
      --verde-salsa: #27ae60;
      --rojo-chile: #c0392b;
      --amarillo-maiz: #f1c40f;
      --azul-talavera: #34495e;
      --blanco-crema: #fefefe;
    }

    body {
      background-color: #fffaf5;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    .container {
      max-width: 600px;
      margin: 60px auto;
      background: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: var(--azul-talavera);
      margin-bottom: 30px;
    }

    input, textarea, select {
      width: 100%;
      padding: 14px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      background-color: var(--rosa-mexicano);
      color: white;
      padding: 14px;
      border: none;
      border-radius: 8px;
      font-size: 17px;
      font-weight: bold;
      width: 100%;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: var(--rojo-chile);
    }

    .volver-panel {
      text-align: center;
      margin-bottom: 25px;
    }

    .volver-panel a {
      background-color: var(--amarillo-maiz);
      padding: 12px 24px;
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

    /* NAVBAR para móviles */
    .mobile-toggle {
      display: none;
      position: absolute;
      top: 32px;
      right: 25px;
      z-index: 10001;
      cursor: pointer;
    }

    #mainav ul {
      display: flex;
      gap: 20px;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    #mainav ul li a {
      text-decoration: none;
      padding: 8px 12px;
      font-weight: bold;
      color: var(--azul-talavera);
      transition: all 0.3s ease;
    }

    #mainav ul li a:hover {
      background-color: var(--verde-salsa);
      color: white !important;
      border-radius: 5px;
    }

    @media screen and (max-width: 768px) {
      .mobile-toggle {
        display: block;
      }

      #mainav {
        display: none;
        width: 100%;
        background-color: var(--blanco-crema);
        position: absolute;
        top: 80px;
        right: 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        border-radius: 0 0 8px 8px;
      }

      #mainav.mobile-shown {
        display: block;
      }

      #mainav ul {
        flex-direction: column;
        align-items: center;
      }

      #mainav ul li {
        width: 100%;
        text-align: center;
        margin: 10px 0;
      }
    }
  </style>
</head>
<body>

<!-- NAVBAR incluida con menú móvil -->
<div class="wrapper row1" style="background-color: var(--blanco-crema); border-bottom: 4px solid var(--rosa-mexicano); position: relative;">
  <header id="header" class="hoc clear" style="position: relative;">
    <div id="logo" class="fl_left">
      <h1 class="logoname" style="font-family: 'Georgia', serif; margin: 0;">
        <a href="/index.php" style="color: var(--rosa-mexicano); text-decoration: none;">
          LaMáscara <span style="color: var(--azul-talavera);">Cocina Mexicana</span>
        </a>
      </h1>
    </div>

    <a class="mobile-toggle" href="javascript:void(0);" onclick="toggleNav()">
      <i class="fas fa-bars" style="font-size: 28px; color: var(--azul-talavera);"></i>
    </a>

    <nav id="mainav" class="fl_right mobile-hidden">
      <ul class="clear" id="nav-items">
        <li><a href="/index.php">Inicio</a></li>
        <li><a href="/nuestro_menu.php">Menú</a></li>
        <li><a href="/promociones.php">Promociones</a></li>
        <li><a href="/sugerencias.php">Sugerencias</a></li>
        <li><a href="/admin/login_admin.php" style="opacity: 0.08;">Administrador</a></li>
      </ul>
    </nav>
  </header>
</div>

<!-- CONTENIDO -->
<div class="container">
  <div class="volver-panel">
    <a href="admin_promociones.php">⬅️ Volver</a>
  </div>

  <h1>Editar Promoción</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="titulo" value="<?= htmlspecialchars($promo['titulo']) ?>" required>
    <textarea name="descripcion" rows="4" required><?= htmlspecialchars($promo['descripcion']) ?></textarea>
    <select name="dia" required>
      <option value="viernes" <?= $promo['dia'] == 'viernes' ? 'selected' : '' ?>>Viernes</option>
      <option value="sabado" <?= $promo['dia'] == 'sabado' ? 'selected' : '' ?>>Sábado</option>
    </select>
    <input type="file" name="imagen" accept="image/*">
    <button type="submit">Actualizar Promoción</button>
  </form>
</div>

<?php include('../includes/footer.php'); ?>

<!-- SCRIPT de menú móvil -->
<script>
  function toggleNav() {
    const nav = document.getElementById("mainav");
    nav.classList.toggle("mobile-shown");
  }
</script>

</body>
</html>
