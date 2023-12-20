<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    include('../controllers/muser.php');
    

    $ndoc= (isset($_POST['documento']) ?$_POST['documento']:null);
    $contrasena= (isset($_POST['contra']) ?$_POST['contra']:null);
    if($ndoc !="" && $contrasena !=""){
        $user = new Usuario();
        $acesso = $user->login($ndoc);


        $pass= sha1(md5($contrasena));
        date_default_timezone_set('America/Bogota');
        $fecha = date('Y');
  
    
    if($acesso){

        if($pass==$acesso[0]['contrasena']){
            $_SESSION['rol']=$acesso[0]['rol'];
            $_SESSION['id']=$acesso[0]['id'];
            $_SESSION['nombre']=$acesso[0]['nombre'];
            $_SESSION['apellidos']=$acesso[0]['apellidos'];
            $_SESSION['genero']=$acesso[0]['genero'];
            $_SESSION['tDoc']=$acesso[0]['tDoc'];
            $_SESSION['poblacion']=$acesso[0]['tpoblacion'];
            $_SESSION['documento']=$acesso[0]['nDoc'];
            $_SESSION['numerocel']=$acesso[0]['numerocel'];
            $_SESSION['correo']=$acesso[0]['correo'];
            $_SESSION['tipodocumento']=$acesso[0]['tDoc'];
            $_SESSION['fecharegistro']=$acesso[0]['fechaper'];
            $_SESSION['fechanacimiento']=$acesso[0]['fechanacimiento'];
            $_SESSION['foto']=$acesso[0]['foto'];
            $_SESSION['fechaactual']= $fecha;
            $_SESSION['departamento']=$acesso[0]['id_depa'];
            $_SESSION['municipio']=$acesso[0]['id_muni'];
            if($_SESSION['rol'] == 1){
                $convocatorias = $user->convocatorias($ndoc);

                if(isset($convocatorias)){
                    $_SESSION['ConvocatoriasInstructor'] = $convocatorias;
                }
                
            }
            
            echo "<script>location.href='../views/menuinstructor.php'</script>";
        }else{
            //echo "<script>alert('sssss')</script>";
            $_SESSION['modal']=true;
            $_SESSION['tipo_alert_Login']="danger";
            $_SESSION['mensajeLogin']="Contraseña incorrecta";
            echo "<script>location.href='../../index/index.php'</script>";
        }

    }else{
        $_SESSION['modal']=true;
        $_SESSION['tipo_alert_Login']="danger";
        $_SESSION['mensajeLogin']="Usuario y/o contraseña incorrectos";
        echo "<script>location.href='../../index/index.php'</script>";
    }
    }else{
        // echo "<script>alert('Ingrese todos los campos')</script>";
        $_SESSION['modal']=true;
        $_SESSION['tipo_alert_Login']="danger";
        $_SESSION['mensajeLogin']="Ingrese todos los campos";
        echo "<script>location.href='../../index/index.php'</script>";
    }

    
?>