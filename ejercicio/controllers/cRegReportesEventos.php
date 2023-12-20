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

        $saveReporte = $consulta->reportefechasEventos($fechainicio,$fechafin);

    }
    if(isset($_GET['reporteFechas'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['eve1'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesEventos.php'</script>";
    }
    if(isset($_GET['canceleve1'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['eve1']);
        echo "<script>location.href='../views/reportesEventos.php'</script>";
    }

    if(isset($_GET['reporteFechasCon'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['con1'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesContacto.php'</script>";
    }
    if(isset($_GET['cancelcon1'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['con1']);
        echo "<script>location.href='../views/reportesContacto.php'</script>";
    }

    

?>