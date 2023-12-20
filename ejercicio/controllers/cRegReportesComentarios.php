<?php
    include("../models/mreportes.php");
   
    $consulta = new ReporteVentas(); // Objecto

    if(isset($_POST['fechainicioreporte'])){

        $fechainicioreporte = (isset($_POST['fechainicioreporte']) ? $_POST['fechainicioreporte']:NULL);
        $fechafinreporte = (isset($_POST['fechafinreporte']) ? $_POST['fechafinreporte']:NULL);

        date_default_timezone_set('America/Bogota');

        $fechainicio = date($fechainicioreporte);
        $fechafin = date($fechafinreporte);

        // var_dump($_POST);
        // die();

        $saveReporte = $consulta->reportefechasComentarios($fechainicio,$fechafin);

    }
    if(isset($_GET['reporteFechas'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com1'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom1'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com1']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['reporteGenero'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com2'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom2'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com2']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['reporteEdad'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com3'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom3'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com3']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['reporteJonada'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com4'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom4'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com4']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['reportetipoCurso'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com5'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom5'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com5']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['reportePuntuacion'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['com6'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    if(isset($_GET['cancelcom6'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['com6']);
        echo "<script>location.href='../views/reportesComentarios.php'</script>";
    }
    
    

?>