<?php
    include('../controllers/muser2.php');
    
    $ndoc= (isset($_POST['documento']) ?$_POST['documento']:null);
    $contrasena= (isset($_POST['contra']) ?$_POST['contra']:null);
    
    if($ndoc !="" && $contrasena !=""){
    $user = new Usuario();
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    $fichaCurso = $_SESSION['cursoinfo'][0]['codigo'];
    $comprobar = $user->comprobar($ndoc,$fichaCurso);
    // var_dump($comprobar);
    // die();
    
    if($comprobar!= false){
    
    $acesso = $user->login($ndoc);


    $pass= sha1(md5($contrasena));
    
  
    if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
    }
    if($acesso){

        if($pass==$acesso[0]['contrasena']){
            $nDoc=$acesso[0]['nDoc'];
           
           
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $fichaCurso = $_SESSION['cursoinfo'][0]['codigo'];
            //$tCurso = $_SESSION['cursoReginfo'][0]['tCurso'];
           
            date_default_timezone_set('America/Bogota');
            $fecha = date("Y-m-d");

            // var_dump($fichaCurso);
            // die();
            $save = $user->regUser($nDoc,$fichaCurso,$fecha);
        
            if ($save) {
                $_SESSION['tipo_alert']="success";
                $_SESSION['mensaje']="Usuario resgitrado Correctamente";
                echo "<script>location.href='../../index/cursomas.php'</script>";
            }else{
                $_SESSION['tipo_alert']="danger";
                $_SESSION['mensaje']="Usuario no registrado";
                echo "<script>location.href='../../index/cursomas.php'</script>";
            }
            
        }else{
            $_SESSION['tipo_alert']="danger";
            $_SESSION['mensaje']="Contraseña incorrecta";

            echo "<script>location.href='../../index/cursomas.php'</script>";
        }

    }else{
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="Usuario y/o contraseña incorrectos";
        echo "<script>location.href='../../index/cursomas.php'</script>";
    }

    }else{
        $_SESSION['tipo_alert']="warning";
        $_SESSION['mensaje']="Usuario ya fue registrado a la convocatoria";
        echo "<script>location.href='../../index/cursomas.php'</script>";
    }
    }else{
        $_SESSION['tipo_alert']="warning";
        $_SESSION['mensaje']="ingrese todos los campos";
        echo "<script>location.href='../../index/cursomas.php'</script>";
    }


    
?>