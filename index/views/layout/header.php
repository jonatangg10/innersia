<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="../ejercicio/img/icono.png">
        <h1>INNERSIA</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Inicio</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#menu">Convocatorias</a></li>
          <li><a href="#events">Eventos</a></li>
          <li><a href="#chefs">Instructores</a></li>
          <li><a href="#gallery">Galeria</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contacto</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" data-bs-toggle="modal" href="#Login" id="LoginModal">Iniciar Sesion</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>

    <?php  if(isset($_SESSION['tipo_alert_Login']) && isset($_SESSION['mensajeLogin']) && isset($_SESSION['modal'])){ ?>
        <script>
          
        setTimeout(()=>{document.getElementById('LoginModal').click()},700) 
      </script>

    <?php unset($_SESSION['modal']); }?>
</header>