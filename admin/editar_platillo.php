<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

function normalizar_nombre($texto) {
  $texto = strtolower($texto);
  $texto = str_replace(['á','é','í','ó','ú','ñ',' '], ['a','e','i','o','u','n',''], $texto);
  return preg_replace('/[^a-z0-9]/', '', $texto);
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->execute([$id]);
$platillo = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $categoria = $_POST['categoria'];

  if (!in_array($categoria, ['Premium', 'Guisado'])) {
    die('❌ Categoría inválida.');
  }

  if (!empty($_FILES['imagen']['tmp_name'])) {
    $nombre_limpio = normalizar_nombre($nombre);
    $carpeta = ($categoria === 'Premium') ? 'images/tacopremium/' : 'images/tacoguisado/';
    $ruta_nueva = "../" . $carpeta . $nombre_limpio . ".png";
    $ruta_bd = $carpeta . $nombre_limpio . ".png";

    $tipo = mime_content_type($_FILES['imagen']['tmp_name']);
    $imagen_origen = null;

    if (in_array($tipo, ['image/jpeg', 'image/jpg'])) {
      $imagen_origen = imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
    } elseif ($tipo === 'image/png') {
      $imagen_origen = imagecreatefrompng($_FILES['imagen']['tmp_name']);
    } elseif ($tipo === 'image/webp') {
      $imagen_origen = imagecreatefromwebp($_FILES['imagen']['tmp_name']);
    }

    if ($imagen_origen) {
      if (!file_exists('../' . $carpeta)) {
        mkdir('../' . $carpeta, 0777, true);
      }

      // Eliminar imagen anterior
      if (!empty($platillo['imagen']) && file_exists("../" . $platillo['imagen'])) {
        unlink("../" . $platillo['imagen']);
      }

      imagepng($imagen_origen, $ruta_nueva);
      imagedestroy($imagen_origen);

      $stmt = $pdo->prepare("UPDATE menu SET nombre=?, descripcion=?, precio=?, categoria=?, imagen=? WHERE id=?");
      $stmt->execute([$nombre, $descripcion, $precio, $categoria, $ruta_bd, $id]);

    } else {
      die('❌ Formato de imagen no soportado.');
    }

  } else {
    $stmt = $pdo->prepare("UPDATE menu SET nombre=?, descripcion=?, precio=?, categoria=? WHERE id=?");
    $stmt->execute([$nombre, $descripcion, $precio, $categoria, $id]);
  }

  header("Location: admin_menu.php?mensaje=platillo_actualizado");
  exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Platillo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
  <style>
    :root {
      --rosa-mexicano: #e2007a;
      --verde-salsa: #27ae60;
      --azul-talavera: #34495e;
      --amarillo-maiz: #f1c40f;
    }

    body {
      background-color: #fffaf5;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      max-width: 650px;
      margin: 50px auto;
      padding: 40px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: var(--azul-talavera);
    }

    input, textarea, select {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      width: 100%;
      background-color: var(--rosa-mexicano);
      color: white;
      padding: 14px;
      border: none;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
    }

    button:hover {
      background-color: var(--verde-salsa);
    }

    .preview {
      text-align: center;
      margin-bottom: 20px;
    }

    .preview img {
      width: 200px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .volver {
      margin-bottom: 30px;
      text-align: center;
    }

    .volver a {
      display: inline-block;
      background-color: var(--amarillo-maiz);
      color: #333;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .volver a:hover {
      background-color: var(--verde-salsa);
      color: white;
    }
  </style>
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="container">
  <div class="volver">
    <a href="admin_menu.php">⬅️ Volver al Panel</a>
  </div>

  <h1>Editar Platillo</h1>

  <form method="POST" enctype="multipart/form-data">
    <div class="preview">
      <p style="font-weight: bold; color: var(--azul-talavera);">Imagen actual:</p>
      <img src="../<?= htmlspecialchars($platillo['imagen']) ?>" alt="Imagen del platillo">
    </div>

    <input type="text" name="nombre" value="<?= htmlspecialchars($platillo['nombre']) ?>" required>
    <textarea name="descripcion" rows="4" required><?= htmlspecialchars($platillo['descripcion']) ?></textarea>
    <input type="number" step="0.01" name="precio" value="<?= $platillo['precio'] ?>" required>

    <select name="categoria" required>
      <option value="Premium" <?= $platillo['categoria'] === 'Premium' ? 'selected' : '' ?>>Taco Premium</option>
      <option value="Guisado" <?= $platillo['categoria'] === 'Guisado' ? 'selected' : '' ?>>Taco de Guisado</option>
    </select>

    <input type="file" name="imagen" accept="image/*">
    <button type="submit">Actualizar Platillo</button>
  </form>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
