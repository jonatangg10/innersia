<?php
    include("consultas.php");
    
    $consulta = new Consultas(); // Objecto


    $testimonio = $consulta->testimonios();
    $tDocs = $consulta->tDoc();
    $genero = $consulta->genero();
    $poblacion = $consulta->poblacion();
    $galeria = $consulta->galeria();
    $depar=$consulta->get_depa();
    $eventos = $consulta->eventos();
    
    $jornada = $consulta->mostrarjornada();
    
    $convocatorias=$consulta->get_convocatorias();

    $nosotros = $consulta->get_nosotros();


    $contarAprendices = $consulta->contarAprendices();
    $contarCursos = $consulta->contarCursos();
    $contarInstructores = $consulta->contarInstructores();
    $contarJornadas = $consulta->contarJornadas();
    
    // $contarAprendicesConvocatorias = $consulta->contarAprendicesConvocatorias();
  


    if(isset($_POST['nombre'])){
        $n = trim(isset($_POST['nombre']) ? $_POST['nombre']:NULL);  
    if(!empty($n)){
        $n1 = trim($n);
        $n2 = strtolower($n1);
        $nombres = ucwords($n2);
        $a = (isset($_POST['apellidos']) ? $_POST['apellidos']:NULL);
        if(!empty($a)){
            $a1 = trim($a);
            $a2 = strtolower($a1);
            $apellidos = ucwords($a2);
            $co = trim(isset($_POST['correo']) ? $_POST['correo']:NULL);    
            $correo = $co;
                if(!empty($correo)){
                    $celular = (isset($_POST['celular']) ? $_POST['celular']:NULL);
                        if(!empty($celular)){
                            if(is_numeric($celular)){
                                $as = trim(isset($_POST['asunto']) ? $_POST['asunto']:NULL);
                                $b = strlen($as);                         
                                    if(strlen($b <= 50)){   
                                        $asunto = ucfirst($as);
                                        $m = trim(isset($_POST['mensaje']) ? $_POST['mensaje']:NULL);
                                        $mensaje = ucfirst($m);
                                            if(!empty($mensaje)){
                                                date_default_timezone_set('America/Bogota');
                                                $fecha = date("Y-m-d h:i:s");
                                                $saveContacto = $consulta->contacto($nombres,$apellidos,$correo,$celular,$asunto,$mensaje,$fecha);
                                                    
                                                    if ($saveContacto) {
                                                        echo "<script>alert('Bien hecho')</script>";
                                                        echo "<script>location.href='../index.php#contact'</script>";
                                                    }else{
                                                        echo "<script>alert('Error')</script>";
                                                        echo "<script>location.href='../index.php#contact'</script>";
                                                    }
                                            }else{
                                                echo "<script>alert('Ingresa un mensaje')</script>";
                                                echo "<script>location.href='../index.php#contact'</script>";
                                            }
                                    }else{
                                        echo "<script>alert('Error, ingresa un asunto menor o igual a 50 caracteres')</script>";
                                        echo "<script>location.href='../index.php#contact'</script>";
                                    }
                            }else{
                                echo "<script>alert('Error')</script>";
                                echo "<script>location.href='../index.php#contact'</script>";
                            }
                        }else{
                            echo "<script>alert('Ingresa un numero de celular')</script>";
                            echo "<script>location.href='../index.php#contact'</script>";
                        }
                }else{
                    echo "<script>alert('Ingresa un correo electronico')</script>";
                    echo "<script>location.href='../index.php#contact'</script>";
                }
        }else{
            echo "<script>alert('Ingresa tus apellidos')</script>";
            echo "<script>location.href='../index.php#contact'</script>";
        }
    }else{
        echo "<script>alert('Ingresa tus nombres')</script>";
        echo "<script>location.href='../index.php#contact'</script>";
    }
}

    if(isset($_POST['nombresTestimonio'])){
        $nombresTestimonio = (isset($_POST['nombresTestimonio']) ? $_POST['nombresTestimonio']:NULL);
        $apellidosTestimonio = (isset($_POST['apellidosTestimonio']) ? $_POST['apellidosTestimonio']:NULL);
        $ocupacionTestimonio = (isset($_POST['ocupacionTestimonio']) ? $_POST['ocupacionTestimonio']:NULL);
        $comentarioTestimonio = (isset($_POST['comentarioTestimonio']) ? $_POST['comentarioTestimonio']:NULL);
        
        if($_FILES['fotoTestimonio']['size']>0){
            date_default_timezone_set('America/Bogota');
            $fecha = date('y-m-d G:i:s');
            $sfecha = strtotime($fecha); // Fecha en numero

            $maincarpeta = '../assets/img/testimonials/';
            if(!file_exists($maincarpeta)){
                mkdir($maincarpeta, 0007, true);
            }
            $nombreArchivoTestimonio = "Testimonio_".$nombresTestimonio;
            $archivofotoTestimonio = $_FILES['fotoTestimonio']['tmp_name'];
            $nombreFotoTestimonio = $_FILES['fotoTestimonio']['name'];

            $explode = explode('.', $nombreFotoTestimonio);
            $extensionFotoTestimonio = array_pop($explode);

            $carpetafoto = "testimonials/";

            $rutaFotoEditar = $maincarpeta.$nombreArchivoTestimonio.".".$extensionFotoTestimonio;
            $rutaFotoEditarSql = $carpetafoto.$nombreArchivoTestimonio.".".$extensionFotoTestimonio;

            // move_uploaded_file($archivofoto,$rutaFotoEditar);
            
            if(move_uploaded_file($archivofotoTestimonio, $rutaFotoEditar)){
                $saveTestimonio = $consulta->SaveTestimonio($nombresTestimonio,$apellidosTestimonio,$ocupacionTestimonio,$comentarioTestimonio,$rutaFotoEditarSql);
                if($saveTestimonio){
                    //session_start();
                    // $_SESSION['tipo_alert']="success";
                    // $_SESSION['mensaje']="Usuario registrado correctamente";
                    echo "<script>alert('Bien')</script>";
                    echo "<script>location.href='../index.php#testimonials'</script>";
                }
            }
        }
    }

    if(isset($_GET['idConvocatoria'])){
        $idcurso = (isset($_GET['idConvocatoria']) ? $_GET['idConvocatoria']:NULL);
        
        $consultarCurso = $consulta->ConsultarCurso($idcurso);

        if($consultarCurso){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['cursoinfo'] = $consultarCurso;
            
            echo "<script>location.href='../cursomas.php'</script>";
        }
    }

    if(isset($_GET['idRegConvocatoria'])){
        $idcurso = (isset($_GET['idRegConvocatoria']) ? $_GET['idRegConvocatoria']:NULL);
        
        $consultarCurso = $consulta->ConsultarRegCurso($idcurso);

        if($consultarCurso){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['cursoReginfo'] = $consultarCurso;
            
            echo "<script>location.href='../index/registro.php'</script>";
        }
    }

    if(isset($_GET['M'])){   
        $file = "../../ejercicio/Manuales/inicio.pdf";
        if (is_file($file)) {
          $filename = "Manual_Uso_Innersia.pdf"; // el nombre con el que se descargará, puede ser diferente al original
        /*header("Content-Type: application/octet-stream");*/
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        readfile($file);
        } else {
        die("Error: no se encontró el archivo '$file'");
        }    
    }

?>
