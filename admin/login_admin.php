<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso Administrador | La Máscara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../layout/styles/layout.css" rel="stylesheet">
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
      background: linear-gradient(135deg, var(--rosa-mexicano), var(--amarillo-maiz), var(--verde-salsa));
      background-size: 600% 600%;
      animation: fondoAnimado 15s ease infinite;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    @keyframes fondoAnimado {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    .login-box {
      background: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
      max-width: 400px;
      width: 90%;
    }

    .login-box h2 {
      text-align: center;
      color: var(--azul-talavera);
      margin-bottom: 30px;
    }

    .login-box input {
      width: 100%;
      padding: 14px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    .login-box button {
      width: 100%;
      padding: 14px;
      background: var(--rosa-mexicano);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-box button:hover {
      background: var(--rojo-chile);
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>Hola Padre, Bienvenido</h2>

  <?php if ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form action="validar_login.php" method="POST">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
  </form>
</div>

</body>
</html>
