<!-- NAVBAR -->
<div class="wrapper row1" style="background-color: var(--blanco-crema); border-bottom: 4px solid var(--rosa-mexicano); position: relative;">
  <header id="header" class="hoc clear" style="position: relative;">

    <!-- LOGO -->
    <div id="logo" class="fl_left">
        <h1 class="logoname" style="color: var(--rosa-mexicano); font-family: 'Georgia', serif;">
          <a href="/index.php" style="color: var(--rosa-mexicano); text-decoration: none;">LaMáscara<span style="color: var(--amarillo-maiz);"> Cocina Mexicana</span></a>
        </h1>
    </div>

    <!-- Botón hamburguesa visible solo en móvil -->
    <a class="mobile-toggle" href="javascript:void(0);" onclick="toggleNav()">
      <i class="fas fa-bars" style="font-size: 28px; color: var(--azul-talavera);"></i>
    </a>

    <!-- NAVIGATION MENU -->
    <nav id="mainav" class="fl_right mobile-hidden">
      <ul class="clear" id="nav-items">
        <li><a href="/nuestro_menu.php">Menú</a></li>
        <li><a href="/promociones.php">Promociones</a></li>
        <li><a href="/sugerencias.php">Sugerencias</a></li>
        <li><a href="/admin/login_admin.php" style="opacity: 0.08;">.</a></li>
      </ul>
    </nav>
  </header>
</div>

<!-- ESTILOS -->
<style>
  :root {
    --rosa-mexicano: #e2007a;
    --rojo-chile: #c0392b;
    --amarillo-maiz: #f1c40f;
    --verde-salsa: #27ae60;
    --azul-talavera: #34495e;
    --blanco-crema: #fefefe;
  }

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

<!-- SCRIPT -->
<script>
  function toggleNav() {
    const nav = document.getElementById("mainav");
    nav.classList.toggle("mobile-shown");
  }
</script>
