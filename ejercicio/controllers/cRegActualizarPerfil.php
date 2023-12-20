<?php
    include("../models/mconsultas.php");
   
    $consulta = new Consultas(); // Objecto

    if(isset($_FILES['foto'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $numDoc =  $_SESSION['documento'];
        $nombre_foto= $_FILES['foto']['name'];
        $nombre_temporal=$_FILES['foto']['tmp_name'];
        $nuevo_nombre="fu_".$numDoc;
        $carpeta = '../img/perfil/';
        //$carpeta = '../img/perfil/'. $numDoc . '/';
        // if(!file_exists($carpeta)){
        //     mkdir($carpeta, 0007, true);
        // }
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
        if(move_uploaded_file($nombre_temporal,$rutafinal)){
            $consulta->actualizarFoto($numDoc,$rutafinalSql);
            if($consulta){
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
            $_SESSION['foto']=$rutafinalSql;
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Foto de perfil actualizada exitosamente";
            echo "<script>location.href='../views/perfil.php'</script>";
            }
        }

    }

    if(isset($_POST['apellidos'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $id =  $_SESSION['id'];
        $n = trim(isset($_POST['nombreedit']) ? $_POST['nombreedit']:NULL);
        
        if(!empty($n)){
            $n1 = strtolower($n);
            $nombre = ucwords($n1);
            $a = trim(isset($_POST['apellidos']) ? $_POST['apellidos']:NULL);
            if(!empty($a)){
                $a1 = strtolower($a);
                $apellidos = ucwords($a1);
                $tipoDoc = (isset($_POST['tDoc']) ? $_POST['tDoc']:NULL);

                if(!empty($tipoDoc)){
                    if(is_numeric($tipoDoc)){
                        $genero = (isset($_POST['genero']) ? $_POST['genero']:NULL);
                        
                        if(!empty($genero)){
                            if(is_numeric($genero)){
                                $tPoblacion = (isset($_POST['tPoblacion']) ? $_POST['tPoblacion']:NULL);
                                if(!empty($tPoblacion)){
                                    if(is_numeric($tPoblacion)){
                                        $numcelular = (isset($_POST['numcelular']) ? $_POST['numcelular']:NULL);
                                        if(!empty($numcelular)){
                                            if(is_numeric($numcelular)){
                                                $num = strlen($numcelular);
                                                if($num >= 10){
                                                    $correo = trim(isset($_POST['correo']) ? $_POST['correo']:NULL);
                                                    if(!empty($correo)){
                                                        
                                                        $consulta->actualizarInformacion($id,$nombre,$apellidos,$tipoDoc,$genero,$tPoblacion,$numcelular,$correo);
                                                        if($consulta){
                                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                // Si no está iniciada, la iniciamos
                                                                session_start();
                                                            }
                                                        $_SESSION['nombre']=$nombre;
                                                        $_SESSION['apellidos']=$apellidos;
                                                        $_SESSION['genero']=$genero;
                                                        $_SESSION['poblacion']=$tPoblacion;
                                                        $_SESSION['tDoc']=$tipoDoc;
                                                        $_SESSION['numerocel']=$numcelular;
                                                        $_SESSION['correo']=$correo;
                                                        $_SESSION['tipo_alert2']="success";
                                                        $_SESSION['mensaje2']="Informacion personal actualizada exitosamente";
                                                        echo "<script>location.href='../views/perfil.php'</script>";
                                                        }

                                                    }else{
                                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                                            // Si no está iniciada, la iniciamos
                                                            session_start();
                                                        }
                                                        $_SESSION['tipo_alert2']="danger";
                                                        $_SESSION['mensaje2']="Ingrese su correo electronico";
                                                        echo "<script>location.href='../views/perfil.php'</script>";
                                                    }
                                                }else{
                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                        // Si no está iniciada, la iniciamos
                                                        session_start();
                                                    }
                                                    $_SESSION['tipo_alert2']="danger";
                                                    $_SESSION['mensaje2']="Longitud de numero telefonico muy corta";
                                                    echo "<script>location.href='../views/perfil.php'</script>";
                                                }
                                            }else{
                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                    // Si no está iniciada, la iniciamos
                                                    session_start();
                                                }
                                                $_SESSION['tipo_alert2']="danger";
                                                $_SESSION['mensaje2']="Error";
                                                echo "<script>location.href='../views/perfil.php'</script>";
                                            }
                                        }else{
                                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                                // Si no está iniciada, la iniciamos
                                                session_start();
                                            }
                                            $_SESSION['tipo_alert2']="danger";
                                            $_SESSION['mensaje2']="Ingrese su numero de celular";
                                            echo "<script>location.href='../views/perfil.php'</script>";
                                        }
                                    }else{
                                        if (session_status() !== PHP_SESSION_ACTIVE) {
                                            // Si no está iniciada, la iniciamos
                                            session_start();
                                        }
                                        $_SESSION['tipo_alert2']="danger";
                                        $_SESSION['mensaje2']="Error";
                                        echo "<script>location.href='../views/perfil.php'</script>";
                                    }
                                }else{
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                        // Si no está iniciada, la iniciamos
                                        session_start();
                                    }
                                    $_SESSION['tipo_alert2']="danger";
                                    $_SESSION['mensaje2']="Seleccione un tipo de poblacion";
                                    echo "<script>location.href='../views/perfil.php'</script>";
                                }
                            }else{
                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    // Si no está iniciada, la iniciamos
                                    session_start();
                                }
                                $_SESSION['tipo_alert2']="danger";
                                $_SESSION['mensaje2']="Error";
                                echo "<script>location.href='../views/perfil.php'</script>";
                            }
                        }else{
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                            $_SESSION['tipo_alert2']="danger";
                            $_SESSION['mensaje2']="Seleccione su genero";
                            echo "<script>location.href='../views/perfil.php'</script>";
                        }
                    }else{
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                        }
                        $_SESSION['tipo_alert2']="danger";
                        $_SESSION['mensaje2']="Error";
                        echo "<script>location.href='../views/perfil.php'</script>";
                    }

                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        // Si no está iniciada, la iniciamos
                        session_start();
                    }
                    $_SESSION['tipo_alert2']="danger";
                    $_SESSION['mensaje2']="Seleccione un tipo de documento";
                    echo "<script>location.href='../views/perfil.php'</script>";
                }


            }else{
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alert2']="danger";
                $_SESSION['mensaje2']="Ingrese sus apellidos";
                echo "<script>location.href='../views/perfil.php'</script>";
            }
             
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['tipo_alert2']="danger";
            $_SESSION['mensaje2']="Ingrese sus nombres";
            echo "<script>location.href='../views/perfil.php'</script>";
        }
        
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
    }

    if(isset($_POST['econtrasena'])){   
        $contrasena = (isset($_POST['contrasena']) ? $_POST['contrasena']:NULL);
        $econtrasena = (isset($_POST['econtrasena']) ? $_POST['econtrasena']:NULL);
        

            if(empty($contrasena && $econtrasena)){  
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
            $_SESSION['tipo_alert3']="danger";
            $_SESSION['mensaje3']="Asegurese de llenar los campos";
            echo "<script>location.href='../views/perfil.php'</script>";     
            }
            elseif($contrasena != $econtrasena){
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alert3']="danger";
                $_SESSION['mensaje3']="Verifique que coincidan las contraseñas";
                echo "<script>location.href='../views/perfil.php'</script>";
            }
            elseif($contrasena == $econtrasena){
                $ncontra = sha1(md5($econtrasena));
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $numDoc =  $_SESSION['documento'];
                    $consulta->actualizar_contraseña($numDoc,$ncontra);
                        if($consulta){
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                        $_SESSION['tipo_alert3']="success";
                        $_SESSION['mensaje3']="Contraseña Editada Exitosamente";
                        echo "<script>location.href='../views/perfil.php'</script>";
                        }
            }
    }




    // if(isset($_POST['nDoc'])){
    //     $nombre = (isset($_POST['nombre']) ? $_POST['nombre']:NULL);
    //     $apellidos = (isset($_POST['apellidos']) ? $_POST['apellidos']:NULL);
    //     $tipoDoc = (isset($_POST['tDoc']) ? $_POST['tDoc']:NULL);
    //     if (session_status() !== PHP_SESSION_ACTIVE) {
    //         // Si no está iniciada, la iniciamos
    //         session_start();
    //     }
    //     $numDoc =  $_SESSION['documento'];
    //     $numcelular = (isset($_POST['numcelular']) ? $_POST['numcelular']:NULL);
    //     $correo = (isset($_POST['correo']) ? $_POST['correo']:NULL);
    //     $contrasena = (isset($_POST['contrasena']) ? $_POST['contrasena']:NULL);
    //     $econtrasena = (isset($_POST['econtrasena']) ? $_POST['econtrasena']:NULL);

    //     if(isset($_FILES['foto'])){
    //         $nombre_foto= $_FILES['foto']['name'];
    //         $nombre_temporal=$_FILES['foto']['tmp_name'];
    //         $nuevo_nombre="fu_".$numDoc;
    //         $carpeta = '../img/perfil/';
    //         //$carpeta = '../img/perfil/'. $numDoc . '/';
    //         // if(!file_exists($carpeta)){
    //         //     mkdir($carpeta, 0007, true);
    //         // }
    //         $explode=explode(".",$nombre_foto);
    //         $extension_archivo=".".array_pop($explode);
    //         $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
    //         $rutafinalSql=$nuevo_nombre.$extension_archivo;

    //         if(empty($contrasena && $econtrasena)){
    //             if(move_uploaded_file($nombre_temporal,$rutafinal)){
    //             $consulta->actualizar_perfil3($nombre,$apellidos,$tipoDoc,$numDoc,$numcelular,$correo,$rutafinalSql);
    //                 if($consulta){
    //                     if (session_status() !== PHP_SESSION_ACTIVE) {
    //                         // Si no está iniciada, la iniciamos
    //                         session_start();
    //                     }
    //                 $_SESSION['foto']=$rutafinalSql;
    //                 $_SESSION['tipo_alert']="success";
    //                 $_SESSION['mensaje']="Perfil editado exitosamente";
    //                 echo "<script>location.href='../views/perfil.php'</script>";
    //                 }
    //             }
    //         }
    //         elseif($contrasena != $econtrasena){
    //             if (session_status() !== PHP_SESSION_ACTIVE) {
    //                 // Si no está iniciada, la iniciamos
    //                 session_start();
    //             }
    //             $_SESSION['tipo_alert']="danger";
    //             $_SESSION['mensaje']="Verifique que coincidan las contraseñas";
    //             echo "<script>location.href='../views/perfil.php'</script>";
    //         }
    //         elseif($contrasena == $econtrasena){
    //             $ncontra = sha1(md5($econtrasena));
    //                 if(move_uploaded_file($nombre_temporal,$rutafinal)){
    //                     $consulta->actualizar_perfil4($nombre,$apellidos,$tipoDoc,$numDoc,$numcelular,$correo,$ncontra,$rutafinalSql);
    //                     if($consulta){
    //                         if (session_status() !== PHP_SESSION_ACTIVE) {
    //                             // Si no está iniciada, la iniciamos
    //                             session_start();
    //                         }
    //                     $_SESSION['foto']=$rutafinalSql;
    //                     $_SESSION['tipo_alert']="success";
    //                     $_SESSION['mensaje']="Perfil editado exitosamente";
    //                     echo "<script>location.href='../views/perfil.php'</script>";
    //                     }
    //                 }
    //         }
    //     }else{
        
    //     if(empty($contrasena && $econtrasena)){
    //         $consulta->actualizar_perfil1($nombre,$apellidos,$tipoDoc,$numDoc,$numcelular,$correo);
    //         if($consulta){
    //             if (session_status() !== PHP_SESSION_ACTIVE) {
    //                 // Si no está iniciada, la iniciamos
    //                 session_start();
    //             }
    //             $_SESSION['tipo_alert']="success";
    //             $_SESSION['mensaje']="Perfil editado exitosamente";
    //             echo "<script>location.href='../views/perfil.php'</script>";
    //         }
    //     }
    //     elseif($contrasena != $econtrasena){
    //         if (session_status() !== PHP_SESSION_ACTIVE) {
    //             // Si no está iniciada, la iniciamos
    //             session_start();
    //         }
    //         $_SESSION['tipo_alert']="danger";
    //         $_SESSION['mensaje']="Verifique que coincidan las contraseñas";
    //         echo "<script>location.href='../views/perfil.php'</script>";
    //     }
    //     elseif($contrasena == $econtrasena){
    //         $ncontra = sha1(md5($econtrasena));
    //         $consulta->actualizar_perfil2($nombre,$apellidos,$tipoDoc,$numDoc,$numcelular,$correo,$ncontra);
    //         if($consulta){
    //             if (session_status() !== PHP_SESSION_ACTIVE) {
    //                 // Si no está iniciada, la iniciamos
    //                 session_start();
    //             }
    //             $_SESSION['tipo_alert']="success";
    //             $_SESSION['mensaje']="Perfil editado exitosamente";
    //             echo "<script>location.href='../views/perfil.php'</script>";
    //         }
    //     }
    // }
    // }

?>