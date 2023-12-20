
<?php
    include("../models/mconsultas.php");
   
    $consulta = new Consultas(); // Objecto

        if(!empty($_GET['eliminar_id'])){
            $idUsuario = $_GET['eliminar_id'];
            $eliminar = $consulta->eliminarmes($idUsuario);
                if($eliminar){
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                    }
                    $_SESSION['tipo_alerta']="success";
                    $_SESSION['mensajes']="Mes De Estudio Eliminado correctamente"; 
                    echo "<script>location.href='../views/registrardias.php'</script>"; 
                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                    }   
                    $_SESSION['tipo_alerta']="danger";
                    $_SESSION['mensajes']="Error"; 
                    echo "<script>location.href='../views/registrardias.php'</script>"; 
                }
        }


    if(isset($_GET['editUser'])){
         
        $id = $_GET['editUser'];
        $eventoOne = $consulta->editarmes($id);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['mesesone'] =$eventoOne;
        echo "<script>location.href='../views/registrardias.php'</script>";

    }

    if(isset($_GET['cancelEdit'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
    unset($_SESSION['mesesone']);
    echo "<script>location.href='../views/registrardias.php'</script>";
}

    if(isset($_POST['eMes'])){
        $eMes = (isset($_POST['eMes']) ? $_POST['eMes']:NULL);
        $eDias = (isset($_POST['eDias']) ? $_POST['eDias']:NULL);
        $eAño = (isset($_POST['eAño']) ? $_POST['eAño']:NULL);
        $eId = (isset($_POST['eId']) ? $_POST['eId']:NULL);

        $ceAño = strlen($eAño);

        if(is_numeric($eDias)){
            if(is_numeric($eAño)){
                if($ceAño == 4){
                    $probarmes = $consulta->existemes($eMes,$eAño);

                    if(is_null($probarmes)){
                        $estudio = $consulta->editarestudio($eDias,$eMes,$eAño,$eId);

                        if($estudio){
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                            }
                            unset($_SESSION['mesesone']);
                            $_SESSION['tipo_alerta']="success";
                            $_SESSION['mensajes']="Editado correctamente"; 
                            echo "<script>location.href='../views/registrardias.php'</script>"; 
                        }else{
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                            unset($_SESSION['mesesone']);
                            $_SESSION['tipo_alerta']="danger";
                            $_SESSION['mensajes']="Error"; 
                            echo "<script>location.href='../views/registrardias.php'</script>"; 
                        }
                    }else{
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                        }
                        $_SESSION['tipo_alerta']="danger";
                        $_SESSION['mensajes']="Mes y Año ya esta registrado"; 
                        echo "<script>location.href='../views/registrardias.php'</script>"; 
                    }
                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        // Si no está iniciada, la iniciamos
                        session_start();
                    }
                    $_SESSION['tipo_alerta']="danger";
                    $_SESSION['mensajes']="Ingrese un AÑO con longitud IGUAL a 4"; 
                    echo "<script>location.href='../views/registrardias.php'</script>"; 
                }
            }else{
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alerta']="danger";
                $_SESSION['mensajes']="Ingrese solo numeros en el año"; 
                echo "<script>location.href='../views/registrardias.php'</script>"; 
            }
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['tipo_alerta']="danger";
            $_SESSION['mensajes']="Ingrese solo numeros en el dia"; 
            echo "<script>location.href='../views/registrardias.php'</script>"; 
        }

        // ---------------------
        //$estudio = $consulta->editarestudio($eMes,$eDias,$eId);

        // if($estudio){
        //     if (session_status() !== PHP_SESSION_ACTIVE) {
        //     // Si no está iniciada, la iniciamos
        //     session_start();
        //     }
        //     $_SESSION['tipo_alerta']="success";
        //     $_SESSION['mensajes']="Dato Editado correctamente"; 
        //     unset($_SESSION['mesesone']);
        //     echo "<script>location.href='../views/registrardias.php'</script>"; 
        // }

    }

    if(!empty($_POST['mes'] && $_POST['dias'])){
        $mes = (isset($_POST['mes']) ? $_POST['mes']:NULL);
        $dias = (isset($_POST['dias']) ? $_POST['dias']:NULL);
        $año = (isset($_POST['año']) ? $_POST['año']:NULL);
        $caño = strlen($año);

        if(is_numeric($dias)){
            if(is_numeric($año)){
                if($caño == 4){
                    $probarmes = $consulta->existemes($mes,$año);
                    if(is_null($probarmes)){
                        $estudio = $consulta->estudio($mes,$dias,$año);
                        if($estudio){
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                            }
                            $_SESSION['tipo_alerta']="success";
                            $_SESSION['mensajes']="Dias De Estudio Registrados correctamente"; 
                            echo "<script>location.href='../views/registrardias.php'</script>"; 
                        }else{
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                            $_SESSION['tipo_alerta']="danger";
                            $_SESSION['mensajes']="Error"; 
                            echo "<script>location.href='../views/registrardias.php'</script>"; 
                        }
                    }else{
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                        }
                        $_SESSION['tipo_alerta']="danger";
                        $_SESSION['mensajes']="Mes ya registrado"; 
                        echo "<script>location.href='../views/registrardias.php'</script>"; 
                    }
                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        // Si no está iniciada, la iniciamos
                        session_start();
                    }
                    $_SESSION['tipo_alerta']="danger";
                    $_SESSION['mensajes']="Ingrese un AÑO con longitud IGUAL a 4"; 
                    echo "<script>location.href='../views/registrardias.php'</script>"; 
                }
            }else{
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alerta']="danger";
                $_SESSION['mensajes']="Ingrese solo numeros en el año"; 
                echo "<script>location.href='../views/registrardias.php'</script>"; 
            }
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['tipo_alerta']="danger";
            $_SESSION['mensajes']="Ingrese solo numeros en el dia"; 
            echo "<script>location.href='../views/registrardias.php'</script>"; 
        }

    

    }

?>