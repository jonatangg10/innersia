<?php
    include("mRegistroConvocatorias.php");
    
    $consulta = new Consultas(); // Objecto


    if(isset($_POST['nDoc'])){
        $numDoc = trim(isset($_POST['nDoc']) ? $_POST['nDoc']:NULL);
        if(!empty($numDoc)){
            if(is_numeric($numDoc)){
                if($numDoc <= 2147483647){
                    $n = trim(isset($_POST['nombre']) ? $_POST['nombre']:NULL);
                    $n1 = strtolower($n);
                    $nombre = ucwords($n1);
                if(!empty($nombre)){
    
                    $a = trim(isset($_POST['apellidos']) ? $_POST['apellidos']:NULL);
                    $a1 = strtolower($a);
                    $apellidos = ucwords($a1);
    
                    if(!empty($apellidos)){
                        
                        $tipoDoc = trim(isset($_POST['tDoc']) ? $_POST['tDoc']:NULL); // Isset determina si esta definida  
    
                            if(is_numeric($tipoDoc)){
    
                                $numeroCel = trim(isset($_POST['numeroCel']) ? $_POST['numeroCel']:NULL);
                                $num = strlen($numeroCel);
                                    if($num == 10){
                                        if(is_numeric($numeroCel)){
    
                                            $correo = trim(isset($_POST['correo']) ? $_POST['correo']:NULL);
        
                                                if(!empty($correo)){
        
                                                    $poblacion = trim(isset($_POST['poblacion']) ? $_POST['poblacion']:NULL);
        
                                                    if(is_numeric($poblacion)){
        
                                                        $rol = 2;
        
                                                            if(is_numeric($rol)){
        
                                                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                    // Si no está iniciada, la iniciamos
                                                                    session_start();
                                                                }
                                                                date_default_timezone_set('America/Bogota');
                                                                $fecha = date("Y-m-d");
        
                                                                    if(!empty($fecha)){
        
                                                                        $fechaNacimiento = (isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento']:NULL);
        
                                                                            if(!empty($fechaNacimiento)){
        
                                                                                $contra = substr($numDoc, -4);    // devuelve "los 4 ultimos numeros"
        
                                                                                    if(!empty($contra)){
        
                                                                                        $departamento = (isset($_POST['departamento']) ? $_POST['departamento']:NULL);
        
                                                                                            if(is_numeric($departamento)){
                                                                                                
                                                                                                $ciudad = (isset($_POST['Ciudad']) ? $_POST['Ciudad']:NULL);
        
                                                                                                    if(is_numeric($ciudad)){
                                                                                                        
                                                                                                        $ncontra = sha1(md5($contra)); 
                                                                                                        
                                                                                                            if(!empty($ncontra)){
        
                                                                                                                $genero = (isset($_POST['genero']) ? $_POST['genero']:NULL);
        
                                                                                                                    if(is_numeric($genero)){
        
                                                                                                                        $formatos_permitidos =  array('pdf');
                                                                                                                        $archivo = $_FILES['ArchivoDocu']['name'];
                                                                                                                        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                                                                                                                        $archivo2 = $_FILES['CertificacionDocu']['name'];
                                                                                                                        $extension2 = pathinfo($archivo2, PATHINFO_EXTENSION);
                                                                                                                        if(!in_array($extension, $formatos_permitidos) ) {
                                                                                                                            echo "<script>alert('Extencion no permitida en el Archivo del Documento de Identidad')</script>";
                                                                                                                            echo "<script>location.href='../registro.php'</script>";
                                                                                                                        }elseif(!in_array($extension2, $formatos_permitidos)){
                                                                                                                            echo "<script>alert('Extencion no permitida en el Archivo de Certificacion Del Documento de Identidad')</script>";
                                                                                                                            echo "<script>location.href='../registro.php'</script>"; // PREGUNTAR AL REDIRECCIONAR QUE NO SE LIMPIE EL FORMULARIO
                                                                                                                        }else{
                                                                                                                        
                                                                                                                            $maincarpeta = '../../ejercicio/documentos/'. $numDoc . '/';
                                                                                                                        
                                                                                                                            if(!file_exists($maincarpeta)){
                                                                                                                                mkdir($maincarpeta, 0007, true);
                                                                                                                            }
                                                                                                                        
                                                                                                                            $nombre_temporal1=$_FILES['ArchivoDocu']['tmp_name'];
                                                                                                                            $nuevo_nombre1="Documento_".$numDoc;
                                                                                                                            $carpeta="../../ejercicio/documentos/". $numDoc . "/";
                                                                                                                            $explode1=explode(".",$archivo);
                                                                                                                            $extension_archivo1=".".array_pop($explode1);
                                                                                                                            $rutafinal1=$carpeta.$nuevo_nombre1.$extension_archivo1;
                                                                                                                            $rutafinalSql1=$nuevo_nombre1.$extension_archivo1;
        
                                                                                                                            if(move_uploaded_file($nombre_temporal1,$rutafinal1)){
                                                                                                                            
                                                                                                                                $nombre_temporal2=$_FILES['CertificacionDocu']['tmp_name'];
                                                                                                                                $nuevo_nombre2="Certificacion_Documento_".$numDoc;
                                                                                                                                // $carpeta2="../documentos/" . $numDoc . "/";
                                                                                                                                $explode2=explode(".",$archivo2);
                                                                                                                                $extension_archivo2=".".array_pop($explode2);
                                                                                                                                $rutafinal2=$carpeta.$nuevo_nombre2.$extension_archivo2;
                                                                                                                                $rutafinalSql2=$nuevo_nombre2.$extension_archivo2;
        
                                                                                                                                if(move_uploaded_file($nombre_temporal2,$rutafinal2)){
                                                                                                                                
                                                                                                                                $saveUser = $consulta->guardar($nombre,$apellidos,$genero,$tipoDoc,$numDoc,$numeroCel,$correo,$rol,$poblacion,
                                                                                                                                                                        $fecha,$fechaNacimiento,$departamento,
                                                                                                                                                                        $ciudad,$rutafinalSql1,$rutafinalSql2,$ncontra);
                                                                                                                                }
                                                                                                                            
                                                                                                                                if($saveUser){
                                                                                                                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                                                                                                                    // Si no está iniciada, la iniciamos
                                                                                                                                    session_start();
                                                                                                                                    }
                                                                                                                                    $_SESSION['tipo_alert']="success";
                                                                                                                                    $_SESSION['mensaje']="Usuario Registrado correctamente , 
                                                                                                                                    Usuario recuerde que su contraseña son los ultimos cuatros dijitos de su cedula";
                                                                                                                                    // echo "<script>alert('Usuario Registrado correctamente,usuario recuerde que su contraseña son los ultimos cuatros dijitos de su cedula')</script>";
                                                                                                                                    echo "<script>location.href='../registro.php'</script>";
                                                                                                                                }else{
                                                                                                                                    echo "<script>alert('Error al registrar')</script>";
                                                                                                                                    echo "<script>location.href='../registro.php'</script>";
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
        
                                                                                            }else{
                                                                                                echo "<script>alert('Error')</script>";
                                                                                                echo "<script>location.href='../registro.php'</script>";
                                                                                            }                      
                                                                                        }else{
                                                                                            echo "<script>alert('Error')</script>";
                                                                                            echo "<script>location.href='../registro.php'</script>";
                                                                                        }               
                                                                                    }else{
                                                                                        echo "<script>alert('Error')</script>";
                                                                                        echo "<script>location.href='../registro.php'</script>";
                                                                                    }
                                                                                }else{
                                                                                    echo "<script>alert('Error')</script>";
                                                                                    echo "<script>location.href='../registro.php'</script>";
                                                                                }
                                                                            }else{
                                                                                echo "<script>alert('Error')</script>";
                                                                                echo "<script>location.href='../registro.php'</script>";
                                                                            }
                                                                        }else{
                                                                            echo "<script>alert('Ingrese su fecha de nacimiento')</script>";
                                                                            echo "<script>location.href='../registro.php'</script>";
                                                                        }
                                                                    }else{
                                                                        echo "<script>alert('Error')</script>";
                                                                        echo "<script>location.href='../registro.php'</script>";
                                                                    }
                                                            }else{
                                                                echo "<script>alert('Error')</script>";
                                                                echo "<script>location.href='../registro.php'</script>";
                                                            }
                                                    }else{
                                                        echo "<script>alert('Error')</script>";
                                                        echo "<script>location.href='../registro.php'</script>";
                                                    }                             
                                                }else{
                                                    echo "<script>alert('Ingrese el campo de Correo')</script>";
                                                    echo "<script>location.href='../registro.php'</script>";
                                                }  
                                        }else{
                                            echo "<script>alert('Error')</script>";
                                            echo "<script>location.href='../registro.php'</script>";
                                        }
                                    }else{
                                        echo "<script>alert('Error')</script>";
                                        echo "<script>location.href='../registro.php'</script>";
                                    }
                            }else{
                                echo "<script>alert('Error')</script>";
                                echo "<script>location.href='../registro.php'</script>";
                            }
                    }else{
                        echo "<script>alert('Ingrese sus apellidos')</script>";
                        echo "<script>location.href='../registro.php'</script>";
                    }
                }else{
                    echo "<script>alert('Ingrese numeros en el ndoc')</script>";
                    echo "<script>location.href='../registro.php'</script>";
                }
                }else{
                    echo "<script>alert('Numero de identidad inexistente')</script>";
                    echo "<script>location.href='../registro.php'</script>";
                } 
            }else{
                echo "<script>alert('Ingrese numeros en el ndoc')</script>";
                echo "<script>location.href='../registro.php'</script>";
            }
        }else{
            echo "<script>alert('Ingrese su numero de documento')</script>";
            echo "<script>location.href='../registro.php'</script>";
        }

        
    }


?>