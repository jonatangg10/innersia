<?php
    include("../models/mreportesPoblacion.php");
   
    $consulta = new ReporteVentas(); // Objecto
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    if(!empty($_GET['poblacion'])){

        $ficha = $_SESSION['convinfo'][0]['convocatorias'];
        // var_dump($ficha);
        // die();

        $saveReporte = $consulta->reportepoblacionaprendices($ficha);

    }
?>