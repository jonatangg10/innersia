<?php 

include("../models/mconsultas.php");
   
$consulta = new Consultas(); // Objecto


// Registrar Usuarios en Interfaz de Coordinador
if(isset($_POST['nDoc'])){
    $n = trim(isset($_POST['nombre']) ? $_POST['nombre']:NULL);
    if(!empty($n)){
        $n1 = strtolower($n);
        $nombre = ucwords($n1);
        $a = trim(isset($_POST['apellidos']) ? $_POST['apellidos']:NULL);
            if(!empty($a)){
                $a1 = strtolower($a);
                $apellidos = ucwords($a1);
                $tipoDoc = trim(isset($_POST['tDoc']) ? $_POST['tDoc']:NULL);
                    if(!empty($tipoDoc)){
                        if(is_numeric($tipoDoc)){
                            $numDoc = trim(isset($_POST['nDoc']) ? $_POST['nDoc']:NULL);
                                if(!empty($numDoc)){
                                    if(is_numeric($numDoc)){
                                        $ndoc = strlen($numDoc);
                                        if($ndoc <= 2147483647){
                                            $numeroCel = (isset($_POST['numeroCel']) ? $_POST['numeroCel']:NULL);
                                            if(!empty($numeroCel)){
                                                if(is_numeric($numeroCel)){
                                                    $num = strlen($numeroCel); 
                                                    if($num == 10){                                                    
                                                        $correo = trim(isset($_POST['correo']) ? $_POST['correo']:NULL);
                                                            if(!empty($correo)){
                                                                $rol = (isset($_POST['rol']) ? $_POST['rol']:NULL);
                                                                    if(!empty($rol)){
                                                                        if(is_numeric($rol)){
                                                                            $tPoblacion = (isset($_POST['tPobla']) ? $_POST['tPobla']:NULL);
                                                                                if(!empty($tPoblacion)){
                                                                                    if(is_numeric($tPoblacion)){
                                                                                        date_default_timezone_set('America/Bogota');
                                                                                        $fecha = date("Y-m-d");
                                                                                        $fechaNacimiento = (isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento']:NULL);
                                                                                            if(!empty($fechaNacimiento)){
                                                                                                $genero = (isset($_POST['genero']) ? $_POST['genero']:NULL);
                                                                                                    if(!empty($genero)){
                                                                                                        if(is_numeric($genero)){
                                                                                                            $contra = substr($numDoc, -4);    // devuelve "los 4 ultimos numeros"
                                                                                                            $departamento = (isset($_POST['departamento']) ? $_POST['departamento']:NULL);
                                                                                                                if(!empty($departamento)){
                                                                                                                    if(is_numeric($departamento)){
                                                                                                                        $ciudad = (isset($_POST['Ciudad']) ? $_POST['Ciudad']:NULL);
                                                                                                                            if(!empty($ciudad)){
                                                                                                                                if(is_numeric($ciudad)){
                                                                                                                                    $ncontra = sha1(md5($contra)); 
                                                                                                                                    $formatos_permitidos =  array('pdf');
                                                                                                                                    $archivo = $_FILES['ArchivoDocu']['name'];
                                                                                                                                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                                                                                                                                    $archivo2 = $_FILES['CertificacionDocu']['name'];
                                                                                                                                    $extension2 = pathinfo($archivo2, PATHINFO_EXTENSION);
                                                                                                                                    if(!in_array($extension, $formatos_permitidos) ) {
                                                                                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                            // Si no está iniciada, la iniciamos
                                                                                                                                            session_start();
                                                                                                                                            }
                                                                                                                                        $_SESSION['tipo_alert']="danger";
                                                                                                                                        $_SESSION['mensaje']="Extencion no permitida en el Archivo del Documento de Identidad";
                                                                                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                                    }elseif(!in_array($extension2, $formatos_permitidos)){
                                                                                                                                        // PREGUNTAR AL REDIRECCIONAR QUE NO SE LIMPIE EL FORMULARIO
                                                                                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                            // Si no está iniciada, la iniciamos
                                                                                                                                            session_start();
                                                                                                                                            }
                                                                                                                                        $_SESSION['tipo_alert']="danger";
                                                                                                                                        $_SESSION['mensaje']="Extencion no permitida en el Archivo de Certificacion Del Documento de Identidad";
                                                                                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                                    }else{
                                                                                                                                        $maincarpeta = '../documentos/'. $numDoc . '/';
                                                                                                                                        if(!file_exists($maincarpeta)){
                                                                                                                                            mkdir($maincarpeta, 0007, true);
                                                                                                                                        }
                                                                                                                                        $nombre_temporal1=$_FILES['ArchivoDocu']['tmp_name'];
                                                                                                                                        $nuevo_nombre1="Documento_".$numDoc;
                                                                                                                                        $carpeta="../documentos/" . $numDoc . "/";
                                                                                                                                        $explode1=explode(".",$archivo);
                                                                                                                                        $extension_archivo1=".".array_pop($explode1);
                                                                                                                                        $rutafinal1=$carpeta.$nuevo_nombre1.$extension_archivo1;
                                                                                                                                        $rutafinalSql1=$nuevo_nombre1.$extension_archivo1;
                                                                                                                                    
                                                                                                                                        if(move_uploaded_file($nombre_temporal1,$rutafinal1)){
                                                                                                                                            $nombre_temporal2=$_FILES['CertificacionDocu']['tmp_name'];
                                                                                                                                            $nuevo_nombre2="Certificacion_Documento_".$numDoc;
                                                                                                                                            $carpeta2="../documentos/" . $numDoc . "/";
                                                                                                                                            $explode2=explode(".",$archivo2);
                                                                                                                                            $extension_archivo2=".".array_pop($explode2);
                                                                                                                                            $rutafinal2=$carpeta2.$nuevo_nombre2.$extension_archivo2;
                                                                                                                                            $rutafinalSql2=$nuevo_nombre2.$extension_archivo2;
                                                                                                                                        
                                                                                                                                            if(move_uploaded_file($nombre_temporal2,$rutafinal2)){
                                                                                                                                                $saveUser = $consulta->guardar_usuario($numDoc,$nombre,$apellidos,$genero,$tipoDoc,$numeroCel,$correo,$rol,$tPoblacion,
                                                                                                                                                                                        $fecha,$fechaNacimiento,$ncontra,$departamento,
                                                                                                                                                                                        $ciudad,$rutafinalSql1,$rutafinalSql2);
                                                                                                                                            }
                                                                                                                                            if($saveUser){
                                                                                                                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                                // Si no está iniciada, la iniciamos
                                                                                                                                                session_start();
                                                                                                                                                }
                                                                                                                                                $_SESSION['tipo_alert']="success";
                                                                                                                                                $_SESSION['mensaje']="Usuario registrado correctamente";
                                                                                                                                                echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }else{
                                                                                                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                        // Si no está iniciada, la iniciamos
                                                                                                                                        session_start();
                                                                                                                                    }
                                                                                                                                    $_SESSION['tipo_alert']="danger";
                                                                                                                                    $_SESSION['mensaje']="Error";
                                                                                                                                    echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                                }
                                                                                                                            }else{
                                                                                                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                    // Si no está iniciada, la iniciamos
                                                                                                                                    session_start();
                                                                                                                                }
                                                                                                                                $_SESSION['tipo_alert']="danger";
                                                                                                                                $_SESSION['mensaje']="Selecciona una ciudad";
                                                                                                                                echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                            }
                                                                                                                    }else{
                                                                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                            // Si no está iniciada, la iniciamos
                                                                                                                            session_start();
                                                                                                                        }
                                                                                                                        $_SESSION['tipo_alert']="danger";
                                                                                                                        $_SESSION['mensaje']="Error";
                                                                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                    }
                                                                                                                }else{
                                                                                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                        // Si no está iniciada, la iniciamos
                                                                                                                        session_start();
                                                                                                                    }
                                                                                                                    $_SESSION['tipo_alert']="danger";
                                                                                                                    $_SESSION['mensaje']="Selecciona un departamento";
                                                                                                                    echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                                }
                                                                                                        }else{
                                                                                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                // Si no está iniciada, la iniciamos
                                                                                                                session_start();
                                                                                                            }
                                                                                                            $_SESSION['tipo_alert']="danger";
                                                                                                            $_SESSION['mensaje']="Error";
                                                                                                            echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                        }
                                                                                                    }else{
                                                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                            // Si no está iniciada, la iniciamos
                                                                                                            session_start();
                                                                                                        }
                                                                                                        $_SESSION['tipo_alert']="danger";
                                                                                                        $_SESSION['mensaje']="Selecciona un tipo de genero";
                                                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                                    }
                                                                                            }else{
                                                                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                    // Si no está iniciada, la iniciamos
                                                                                                    session_start();
                                                                                                }
                                                                                                $_SESSION['tipo_alert']="danger";
                                                                                                $_SESSION['mensaje']="Selecciona una fecha de nacimiento";
                                                                                                echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                            }
                                                                                    }else{
                                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                            // Si no está iniciada, la iniciamos
                                                                                            session_start();
                                                                                        }
                                                                                        $_SESSION['tipo_alert']="danger";
                                                                                        $_SESSION['mensaje']="Error";
                                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                    }
                                                                                }else{
                                                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                        // Si no está iniciada, la iniciamos
                                                                                        session_start();
                                                                                    }
                                                                                    $_SESSION['tipo_alert']="danger";
                                                                                    $_SESSION['mensaje']="Selecciona un tipo de población";
                                                                                    echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                                }
                                                                        }else{
                                                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                // Si no está iniciada, la iniciamos
                                                                                session_start();
                                                                            }
                                                                            $_SESSION['tipo_alert']="danger";
                                                                            $_SESSION['mensaje']="Error";
                                                                            echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                        }
                                                                    }else{
                                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                            // Si no está iniciada, la iniciamos
                                                                            session_start();
                                                                        }
                                                                        $_SESSION['tipo_alert']="danger";
                                                                        $_SESSION['mensaje']="Selecciona un rol";
                                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                                    }
                                                            }else{
                                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                    // Si no está iniciada, la iniciamos
                                                                    session_start();
                                                                }
                                                                $_SESSION['tipo_alert']="danger";
                                                                $_SESSION['mensaje']="Ingresa el correo electronico";
                                                                echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                            }                    
                                                    }else{
                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                            // Si no está iniciada, la iniciamos
                                                            session_start();
                                                        }
                                                        $_SESSION['tipo_alert']="danger";
                                                        $_SESSION['mensaje']="Ingresa numero de celular con longitud de 10 digitos";
                                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                    }
                                                }else{
                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                        // Si no está iniciada, la iniciamos
                                                        session_start();
                                                    }
                                                    $_SESSION['tipo_alert']="danger";
                                                    $_SESSION['mensaje']="Error";
                                                    echo "<script>location.href='../views/registrarusuario.php'</script>";
                                                }
                                            }else{
                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                    // Si no está iniciada, la iniciamos
                                                    session_start();
                                                }
                                                $_SESSION['tipo_alert']="danger";
                                                $_SESSION['mensaje']="Ingrese un numero de celular";
                                                echo "<script>location.href='../views/registrarusuario.php'</script>";
                                            }
                                        }else{
                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                                // Si no está iniciada, la iniciamos
                                                session_start();
                                            }
                                            $_SESSION['tipo_alert']="danger";
                                            $_SESSION['mensaje']="Numero de documento de identidad inexistente";
                                            echo "<script>location.href='../views/registrarusuario.php'</script>";
                                        }
                                    }else{
                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                            // Si no está iniciada, la iniciamos
                                            session_start();
                                        }
                                        $_SESSION['tipo_alert']="danger";
                                        $_SESSION['mensaje']="Error";
                                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                                    }
                                }else{
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                        // Si no está iniciada, la iniciamos
                                        session_start();
                                    }
                                    $_SESSION['tipo_alert']="danger";
                                    $_SESSION['mensaje']="Ingrese un numero de documento";
                                    echo "<script>location.href='../views/registrarusuario.php'</script>";
                                }
                        }else{
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                            $_SESSION['tipo_alert']="danger";
                            $_SESSION['mensaje']="Error";
                            echo "<script>location.href='../views/registrarusuario.php'</script>";
                        }
                    }else{
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                        }
                        $_SESSION['tipo_alert']="danger";
                        $_SESSION['mensaje']="Seleccione un tipo de documento";
                        echo "<script>location.href='../views/registrarusuario.php'</script>";
                    }
            }else{
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alert']="danger";
                $_SESSION['mensaje']="Ingrese los apellidos";
                echo "<script>location.href='../views/registrarusuario.php'</script>";
            }       
    }else{
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="Ingrese los nombres";
        echo "<script>location.href='../views/registrarusuario.php'</script>";
    }
      
}


?>