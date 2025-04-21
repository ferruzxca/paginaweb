<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sugerencias | La Máscara</title>
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

    .sugerencias-header {
      background-image: url('images/backgrounds/mex.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 30px;
      text-align: center;
      color: white;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.8);
    }

    .sugerencias-header h1 {
      font-size: 60px;
      margin-bottom: 15px;
    }

    .sugerencias-header p {
      font-size: 20px;
    }

    .form-container {
      max-width: 600px;
      margin: 60px auto;
      background: white;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      border: 3px solid var(--amarillo-maiz);
    }

    .form-container h2 {
      text-align: center;
      color: var(--azul-talavera);
      margin-bottom: 30px;
    }

    input, textarea {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 15px;
      background: var(--rosa-mexicano);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 17px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: var(--rojo-chile);
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

    @media screen and (max-width: 600px) {
      .sugerencias-header h1 {
        font-size: 38px;
      }
      .sugerencias-header p {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>

<?php include('includes/navbar.php'); ?>

<div class="sugerencias-header">
  <h1>Sugerencias</h1>
  <p>¿Tienes una idea o comentario? ¡Queremos escucharte!</p>
</div>

<div class="form-container">
  <h2>Envíanos tu sugerencia</h2>
  <form action="https://formsubmit.co/lamascaracm@gmail.com" method="POST">
    <input type="text" name="nombre" placeholder="Tu nombre completo" required>
    <input type="email" name="email" placeholder="Tu correo electrónico" required>
    <textarea name="mensaje" rows="6" placeholder="Escribe tu mensaje aquí..." required></textarea>

    <!-- Opcionales -->
    <input type="hidden" name="_next" value="https://cocinalamascara.ct.ws/gracias.html">
    <input type="hidden" name="_captcha" value="false">

    <button type="submit">Enviar mensaje</button>
  </form>
</div>

<a href="https://wa.me/525644115556" class="whatsapp-float" target="_blank" title="¡Contáctanos por WhatsApp!">
  <img src="images/whatsapp_logo.png" alt="WhatsApp">
</a>

<?php include('includes/footer.php'); ?>

</body>
</html>
