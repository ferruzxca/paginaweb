<?php
session_start();
require_once '../includes/conexion.php';
require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $dia = $_POST['dia'];
    $imagen = 'images/promociones/' . $_FILES['imagen']['name'];
    
    // Guardar imagen en carpeta
    move_uploaded_file($_FILES['imagen']['tmp_name'], '../' . $imagen);

    $stmt = $pdo->prepare("INSERT INTO promociones (titulo, descripcion, imagen, dia, activa) VALUES (?, ?, ?, ?, 1)");
    $stmt->execute([$titulo, $descripcion, $imagen, $dia]);

    header("Location: admin_promociones.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Promoción</title>
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
      font-size: 16px; font-weight: bold;
      cursor: pointer; width: 100%;
    }
    button:hover { background-color: #c0392b; }
  </style>
</head>
<body>

<?php include('../includes/navbar.php'); ?>

<div class="container">
  <h1>Agregar Promoción</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <select name="dia" required>
      <option value="">Selecciona el día</option>
      <option value="viernes">Viernes</option>
      <option value="sabado">Sábado</option>
    </select>
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Guardar</button>
  </form>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
