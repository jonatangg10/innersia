<?php if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }?>

<?php include_once "controllers/controlador.php"; ?>
<?php include_once("forms/lib_fecha_texto.php"); ?>
<?php include('views/layout/head.php'); ?>

<body>

  <!-- ======= Header ======= -->
    <?php include('views/layout/headerCursos.php'); ?>
    <?php include('views/layout/login.php'); ?>
    <?php //include('views/layout/cabezera.php'); ?>
  <!-- End Header -->

  <main id="main">
    <br>
    <?php include('views/layout/masCurso.php'); ?>

    <?php 
            // var_dump($_SESSION['cursoinfo']);
            // die();?>

  </main>
  <!-- End #main -->

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