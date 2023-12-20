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

        $saveReporte = $consulta->reportefechasConvocatorias($fechainicio,$fechafin);

    }

    if(isset($_GET['reporteFechas'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['conv1'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    if(isset($_GET['cancelconv1'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['conv1']);
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    if(isset($_GET['reporteJonada'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['conv2'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    if(isset($_GET['cancelconv2'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['conv2']);
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    if(isset($_GET['reportetipoCurso'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['conv3'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    if(isset($_GET['cancelconv3'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['conv3']);
        echo "<script>location.href='../views/reportesConvocatorias.php'</script>";
    }
    

?>