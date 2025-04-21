<!-- FOOTER con imagen de fondo -->
<div class="bgded overlay row4" style="background-image: url('/images/backgrounds/footer.jpg'); background-size: cover; background-position: center; color: white; padding-top: 40px;">
  <footer id="footer" class="hoc clear" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; padding: 40px;">
    <div class="footer-grid">
      
      <div class="footer-col">
        <h1 class="logoname" style="color: var(--rosa-mexicano); font-family: 'Georgia', serif;">
          <a href="/index.php" style="color: var(--rosa-mexicano); text-decoration: none;">LaMáscara<span style="color: var(--amarillo-maiz);"> Cocina Mexicana</span></a>
        </h1>
        <p style="color: var(--blanco-crema); margin-top: 10px;">
          Un pedacito de México en cada bocado.<br> Sabor, tradición y sazón en cada platillo. ¡Gracias por visitarnos!
        </p>
      </div>

      <div class="footer-col">
        <h6 class="heading" style="color: var(--amarillo-maiz);">Horario</h6>
        <ul class="nospace linklist">
          <li>Lunes a Viernes: 12:00 - 21:00</li>
          <li>Sábado: 12:00 - 23:00</li>
          <li>Domingo: Cerrado</li>
        </ul>
      </div>

      <div class="footer-col">
        <h6 class="heading" style="color: var(--amarillo-maiz);">Contáctanos</h6>
        <ul class="faico clear">
          <li><a class="faicon-whatsapp" href="https://wa.me/525644115556" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
          <li><a class="faicon-facebook" href="https://www.facebook.com/share/1Bkm3mwAis/?mibextid=wwXIfr"><i class="fab fa-facebook"></i></a></li>
          <li><a class="faicon-instagram" href="https://www.instagram.com/lamascaracocinamexicana?igsh=ZDB0ZHA1aXJhaGFl&utm_source=qr"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>

    </div>
  </footer>
</div>

<!-- COPYRIGHT -->
<div class="wrapper row5" style="background-color: var(--rojo-chile); color: white;">
  <div id="copyright" class="hoc clear" style="text-align: center; padding: 10px;">
    <p style="margin: 0;">© 2025 La Máscara Cocina Mexicana &nbsp;|&nbsp; Diseño con ❤️ y sabor a México</p>
  </div>
</div>

<!-- FOOTER ESTILOS RESPONSIVOS -->
<style>
  .footer-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
  }

  .footer-col {
    flex: 1 1 220px;
    min-width: 180px;
  }

  .footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-col ul li {
    margin-bottom: 8px;
  }

  .footer-col ul li a {
    color: var(--blanco-crema);
    text-decoration: none;
  }

  .footer-col ul li a:hover {
    text-decoration: underline;
    color: var(--amarillo-maiz);
  }

  @media (max-width: 768px) {
    .footer-grid {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .footer-col {
      flex: 1 1 100%;
    }

    .footer-col ul {
      padding-left: 0;
    }

    .faico a {
        font-size: 22px;
        display: inline-block;
        width: 45px;
        height: 45px;
        line-height: 45px;
        margin: 5px;
        text-align: center;
        border-radius: 50%;
        background-color: rgba(255,255,255,0.1);
        color: white;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .faicon-whatsapp:hover {
        background-color: #25D366;
        color: white;
    }

  .faicon-facebook:hover {
    background-color: #1877f2;
    color: white;
  }

  .faicon-instagram:hover {
    background-color: #e1306c;
    color: white;
  }

  /* Enlaces del footer */
  .footer-col ul li a {
    color: var(--blanco-crema);
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-col ul li a:hover {
    color: var(--amarillo-maiz);
    text-decoration: underline;
  }
  }
</style>
