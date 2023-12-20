<?php

include("../models/mconsultas.php");

    $consulta = new consultas();


    if(isset($_GET['rolemisor'])){

        $rolemisor = $_GET['rolemisor'];

        $posiblesreceptores = $consulta->traerReceptores($rolemisor);


        if($posiblesreceptores){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['receptores'] = $posiblesreceptores;
            
            echo "<script>location.href='../views/notificar.php'</script>";
        }else{
            echo "<script>alert('no hay receptores')</script>";
            echo "<script>window.history.back()</script>";
        }

    }

    if(isset($_POST['docu_receptor'])){

        $docureceptor = (isset($_POST['docu_receptor'])?$_POST['docu_receptor']:null);
        $titulo = (isset($_POST['titulo'])?$_POST['titulo']:null);
        $texto = (isset($_POST['texto'])?$_POST['texto']:null);
        $tipoaviso = (isset($_POST['tiponoti'])?$_POST['tiponoti']:null);

        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $docuemisor = $_SESSION['documento'];
        $fotoemisor = $_SESSION['foto'];
        date_default_timezone_set('America/Bogota');
        $fechaenvio = date("Y-m-d h:i:s");
        $estado = "no leido";

                                
        $mensaje = $consulta->enviarmensaje($docureceptor,$titulo,$texto,$docuemisor,$fotoemisor,$fechaenvio,$estado,$tipoaviso);

        if($mensaje){
            echo "<script>alert('Mensaje enviado ')</script>";
            echo "<script>location.href='../views/notificar.php'</script>";

        }

    }

    if(isset($_GET['mensajeleido'])){

        $id = $_GET['mensajeleido'];
        $mensajeleido = $consulta->borrarmensaje($id);
        if($mensajeleido){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }         
            echo "<script>alert('Mensaje borrado')</script>";
            echo "<script>location.href='../views/menuinstructor.php'</script>";
        }

    }




?>