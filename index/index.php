<?php 
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
?>

<?php include_once "controllers/controlador.php"; ?>
<?php include_once("forms/lib_fecha_texto.php"); ?>

<?php include('views/layout/head.php'); ?>

<body>

  <!-- ======= Header ======= -->
    <?php include('views/layout/header.php'); ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    <?php include('views/layout/cabezera.php'); ?>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
      <?php include('views/layout/nosotros.php'); ?>
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
      <?php include('views/layout/informacion.php'); ?>
    <!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
      <?php include('views/layout/contador.php'); ?>
    <!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
      <?php //include('views/layout/modalcurso.php'); ?>
      <?php include('views/layout/cursos.php'); ?>
    <!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
      <?php include('views/layout/testimonios.php'); ?>
    <!-- End Testimonials Section -->

    <!-- ======= Events Section ======= -->
      <?php include('views/layout/eventos.php'); ?>
    <!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
      <?php include('views/layout/equipo.php'); ?>
    <!-- End Chefs Section -->

    <!-- ======= Book A Table Section ======= -->
      <?php include('views/layout/login.php'); ?>

          
    <!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
      <?php include('views/layout/galeria.php'); ?>
    <!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
      <?php include('views/layout/contacto.php'); ?>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php include('views/layout/footer.php'); ?>
  <!-- End Footer -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>