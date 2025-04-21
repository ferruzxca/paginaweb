<?php require_once 'includes/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>La Máscara Cocina Mexicana</title>
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
      line-height: 1.6;
      background-color: #fffaf5;
      color: #333;
    }

    .hero {
      background: linear-gradient(135deg, var(--rojo-chile), var(--amarillo-maiz), var(--verde-salsa));
      background-size: 600% 600%;
      animation: animarFondo 10s ease infinite;
      color: white;
      text-align: center;
      padding: 140px 30px;
      position: relative;
    }

    .hero h1 {
      font-size: 60px;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    }

    .hero p {
      font-size: 22px;
      max-width: 700px;
      margin: 0 auto 35px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
    }

    .hero a {
      background: var(--rosa-mexicano);
      color: white;
      padding: 16px 36px;
      text-decoration: none;
      border-radius: 10px;
      font-weight: bold;
      font-size: 18px;
      transition: background 0.3s ease;
    }

    .hero a:hover {
      background: var(--rojo-chile);
    }

    .seccion-breve {
      padding: 80px 20px;
      text-align: center;
    }

    .seccion-breve h2 {
      font-size: 36px;
      color: var(--azul-talavera);
      margin-bottom: 20px;
    }

    .seccion-breve p {
      font-size: 18px;
      max-width: 750px;
      margin: 0 auto;
      color: #444;
    }

    .seccion-breve a.btn {
      display: inline-block;
      margin-top: 30px;
      background: var(--verde-salsa);
      color: white;
      padding: 14px 28px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      font-size: 17px;
    }

    .seccion-breve a.btn:hover {
      background: var(--rosa-mexicano);
    }

    iframe {
      margin-top: 20px;
      border-radius: 12px;
    }

    @keyframes animarFondo {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    /* Botón flotante WhatsApp */
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

<!-- Hero principal original (comentado)
<div class="hero">
  <h1>Bienvenidos a La Máscara</h1>
  <p>Auténtica cocina mexicana con el sazón casero que nos distingue. ¡Ven y descúbrelo!</p>
  <a href="nuestro_menu.php">Ver Nuestro Menú</a>
</div>
-->

<!-- Nueva imagen de fondo en lugar del hero animado -->
<div style="
  background: url('images/backgrounds/mascarabg.jpg') center center/cover no-repeat;
  height: 450px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  position: relative;
">
  <div style="background-color: rgba(0,0,0,0.4); padding: 40px; border-radius: 16px;">
    <h1 style="font-size: 50px; text-shadow: 2px 2px 5px rgba(0,0,0,0.8); margin-bottom: 15px;">¡Bienvenido a La Máscara!</h1>
    <p style="font-size: 20px; max-width: 700px; margin: auto;">Descubre los sabores más auténticos de la cocina mexicana, hechos con pasión y tradición.</p>
    <br>
    <a href="nuestro_menu.php" style="
      background-color: var(--rosa-mexicano);
      color: white;
      padding: 14px 30px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 18px;
      display: inline-block;
      margin-top: 20px;
    ">Ver Nuestro Menú</a>
  </div>
</div>


<!-- Sección de resumen -->
<div class="seccion-breve">
  <h2>Un sabor que cuenta historias</h2>
  <p>
    En La Máscara Cocina Mexicana, cada taco, cada salsa, cada ingrediente... tiene un origen, una receta ancestral, y sobre todo: mucho corazón. Nuestro compromiso es ofrecerte una experiencia culinaria única, donde la tradición se mezcla con el buen gusto.
  </p>
  <a href="promociones.php" class="btn">Ver Promociones</a>
</div>

<!-- Sección de ubicación -->
<div class="seccion-breve" style="background-color:#f8f8f8;">
  <h2>¿Dónde estamos?</h2>
  <p>Ven a visitarnos y disfruta del verdadero sabor de México.</p>
  <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.081064097735!2d-99.2072582!3d19.5298258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d21d4c006d29bd%3A0x8bf9869c80fd5aac!2sOtumba%20Pte.%2021%2C%20Tlalnemex%2C%2054070%20Tlalnepantla%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1713464601211!5m2!1ses-419!2smx" 
    width="100%" 
    height="400" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</div>

<!-- Botón flotante de WhatsApp -->
<a href="https://wa.me/525644115556" class="whatsapp-float" target="_blank" title="¡Contáctanos por WhatsApp!">
  <img src="images/whatsapp_logo.png" alt="WhatsApp">
</a>

<?php include('includes/footer.php'); ?>

</body>
</html>
