<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

// Función para normalizar nombres de archivos
function normalizar_nombre($texto) {
  $texto = strtolower($texto);
  $texto = str_replace(
    ['á','é','í','ó','ú','ñ',' '],
    ['a','e','i','o','u','n',''],
    $texto
  );
  return preg_replace('/[^a-z0-9]/', '', $texto);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $categoria = $_POST['categoria'];

  // Validar categorías permitidas
  if (!in_array($categoria, ['Premium', 'Guisado'])) {
    die('❌ Solo se permiten las categorías Premium o Guisado.');
  }

  // Validar imagen
  if (!empty($_FILES['imagen']['tmp_name'])) {
    $nombre_limpio = normalizar_nombre($nombre);

    // Determinar carpeta de imágenes según categoría
    $carpeta_img = ($categoria === 'Premium') ? 'images/tacopremium/' : 'images/tacoguisado/';
    $ruta_bd = $carpeta_img . $nombre_limpio . '.png';
    $ruta_nueva = '../' . $ruta_bd;

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
      // Crear carpeta si no existe
      if (!file_exists('../' . $carpeta_img)) {
        mkdir('../' . $carpeta_img, 0777, true);
      }

      // Guardar la imagen como .png
      imagepng($imagen_origen, $ruta_nueva);
      imagedestroy($imagen_origen);

      // Insertar en base de datos
      $stmt = $pdo->prepare("INSERT INTO menu (nombre, descripcion, precio, categoria, imagen, activo) VALUES (?, ?, ?, ?, ?, 1)");
      $stmt->execute([$nombre, $descripcion, $precio, $categoria, $ruta_bd]);

      header("Location: admin_menu.php");
      exit;
    } else {
      die('❌ Formato de imagen no soportado.');
    }
  } else {
    die('❌ Imagen requerida.');
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Platillo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
  <style>
    body { background-color: #fffaf5; font-family: 'Segoe UI', sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 60px 20px; }
    h1 { text-align: center; color: #34495e; margin-bottom: 30px; }
    input, textarea, select {
      width: 100%; padding: 14px; margin-bottom: 20px;
      border: 1px solid #ccc; border-radius: 8px;
    }
    button {
      background-color: #e2007a; color: white;
      border: none; padding: 12px 20px; border-radius: 8px;
      font-size: 16px; font-weight: bold; cursor: pointer; width: 100%;
    }
    button:hover { background-color: #c0392b; }
  </style>
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="container">
  <h1>Agregar Platillo</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre del platillo" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <select name="categoria" required>
      <option value="">Selecciona categoría</option>
      <option value="Premium">Taco Premium</option>
      <option value="Guisado">Taco de Guisado</option>
    </select>
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Guardar Platillo</button>
  </form>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
