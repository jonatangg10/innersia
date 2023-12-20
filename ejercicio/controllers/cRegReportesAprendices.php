<?php
    include("../models/mreportes.php");
   
    $consulta = new ReporteVentas(); // Objecto



    

    if(isset($_GET['reporteFechas'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['h'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancelRh'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['h']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }

    if(isset($_GET['reporteGenero'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['i'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['canceli'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['i']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['reporteFicha'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['j'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancelj'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['j']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['reporteLugar'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['k'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancelk'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['k']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['reporteEdad'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['q'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancelq'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['q']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['reporteJonada'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['l'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancell'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['l']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['reportetipoCurso'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['m'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }
    if(isset($_GET['cancelm'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['m']);
        echo "<script>location.href='../views/reportesAprendices.php'</script>";
    }


    

?>