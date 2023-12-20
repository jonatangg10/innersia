<?php
    include("../models/mconsultas.php");
    

    $consulta = new Consultas(); // Objecto
    //$recurso = $consulta->registrarcurso();
    $tipoCurso = $consulta->mostrarTipoCurso();
    $jornada = $consulta->mostrarjornada();
    $instructores = $consulta->instructor();
    $curso = $consulta->curso();

    if(isset($_POST['nomCurso'])){
        $nombre = ucfirst(isset($_POST['nomCurso']) ? $_POST['nomCurso']:NULL);
        $tCurso = (isset($_POST['tipoDeCurso']) ? $_POST['tipoDeCurso']:NULL);
        $ficha = (isset($_POST['numCurso']) ? $_POST['numCurso']:NULL);
        $jornada = (isset($_POST['jornada']) ? $_POST['jornada']:NULL);
        $instructor = (isset($_POST['instructor']) ? $_POST['instructor']:NULL);
        $fechainicio = (isset($_POST['fechainicio']) ? $_POST['fechainicio']:NULL);
        $fechafin = (isset($_POST['fechafin']) ? $_POST['fechafin']:NULL);
        $descripcion = ucfirst(isset($_POST['descripcion']) ? $_POST['descripcion']:NULL);

        $nombre_foto= $_FILES['fotoc']['name'];
        $nombre_temporal=$_FILES['fotoc']['tmp_name'];
        $nuevo_nombre="Curso_".$ficha;
        $carpeta="../img/convocatorias/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;

        //-----------------
        if(move_uploaded_file($nombre_temporal,$rutafinal)){
            $savecur = $consulta->registrarcurso($nombre,$tCurso,$ficha,$jornada,$fechainicio,$fechafin,$descripcion,$rutafinalSql,$instructor);
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                    session_start();
            }
            $_SESSION['tipo_alert']="danger";
            $_SESSION['mensaje']="Error";
            echo "<script>location.href='../views/registrarcurso.php'</script>";
        }

        if($savecur){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Curso registrado correctamente";
            echo "<script>location.href='../views/registrarcurso.php'</script>";
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                    session_start();
            }
            $_SESSION['tipo_alert']="danger";
            $_SESSION['mensaje']="Error";
            echo "<script>location.href='../views/registrarcurso.php'</script>";
        }
    }
    if(isset($_GET['cancelEditcur'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['cursoOne']);
        echo "<script>location.href='../views/registrarcurso.php'</script>";
    }

    if(isset($_GET['ediCurso'])){
         
        $idCur = $_GET['ediCurso'];
        $CursoOne = $consulta->editarCursoone($idCur);
        // var_dump($UsuarioOne);
        // die();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['idconvocatoria'] = $idCur;
        $_SESSION['cursoOne'] =$CursoOne;
        echo "<script>location.href='../views/registrarcurso.php'</script>";

    }
    if(!empty($_POST['eFicha'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $id= $_SESSION['idconvocatoria'];
        $n = strtolower(isset($_POST['enomCurso']) ? $_POST['enomCurso']:NULL);
        $nombre = ucfirst($n);
        $tipoCurso = (isset($_POST['etipoDeCurso']) ? $_POST['etipoDeCurso']:NULL);
        $ficha = (isset($_POST['eFicha']) ? $_POST['eFicha']:NULL);
        $jornada = (isset($_POST['ejornada']) ? $_POST['ejornada']:NULL);
        $instructor = (isset($_POST['einstructor']) ? $_POST['einstructor']:NULL);
        $fechainicio = (isset($_POST['efechainicio']) ? $_POST['efechainicio']:NULL);
        $fechafin = (isset($_POST['efechafin']) ? $_POST['efechafin']:NULL);
        $d = strtolower(isset($_POST['edescripcion']) ? $_POST['edescripcion']:NULL);
        $descripcion = ucfirst($d);
        if(!empty($_FILES['efoto']['name'])){
            $nombre_foto= $_FILES['efoto']['name'];
            $nombre_temporal=$_FILES['efoto']['tmp_name'];
            $nuevo_nombre="Curso_".$ficha;
            $carpeta="../img/convocatorias/";
            $explode=explode(".",$nombre_foto);
            $extension_archivo=".".array_pop($explode);
            $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
            $rutafinalSql=$nuevo_nombre.$extension_archivo;
            move_uploaded_file($nombre_temporal,$rutafinal);
            // var_dump("hola");
            // die();
        }else{
            $rutafinalSql="";
        }
        if(!empty($id)){
            if(is_numeric($id)){
                if(!empty($n)){
                    if(!empty($tipoCurso)){
                        if(!empty($ficha)){
                            if(is_numeric($ficha)){
                                $save = $consulta->editconvocatoriasCor($nombre,$tipoCurso,$ficha,$jornada,$fechainicio,$fechafin,$descripcion,$rutafinalSql,$instructor,$id);

                                if($save){
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                    // Si no está iniciada, la iniciamos
                                        session_start();
                                    }
                                    unset($_SESSION['cursoOne']);
                                    $_SESSION['tipo_alert']="success";
                                    $_SESSION['mensaje']="Convocatoria editada correctamente";
                                    echo "<script>location.href='../views/registrarcurso.php'</script>";
                                }else{
                                    if (session_status() !== PHP_SESSION_ACTIVE) {
                                        // Si no está iniciada, la iniciamos
                                            session_start();
                                        }
                                    unset($_SESSION['cursoOne']);
                                    $_SESSION['tipo_alert']="danger";
                                    $_SESSION['mensaje']="Error al editar la convocatoria";
                                    echo "<script>location.href='../views/registrarcurso.php'</script>";
                                }
                            }else{
                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    // Si no está iniciada, la iniciamos
                                    session_start();
                                }
                                $_SESSION['tipo_alert']="danger";
                                $_SESSION['mensaje']="Ingrese solo numeros en la ficha de la convocatoria"; 
                                echo "<script>location.href='../views/registrarcurso.php'</script>"; 
                            }
                        }else{
                            if (session_status() !== PHP_SESSION_ACTIVE) {
                                // Si no está iniciada, la iniciamos
                                session_start();
                            }
                            $_SESSION['tipo_alert']="danger";
                            $_SESSION['mensaje']="Ingrese el campo de ficha del curso"; 
                            echo "<script>location.href='../views/registrarcurso.php'</script>";
                        }

                    }else{
                        if (session_status() !== PHP_SESSION_ACTIVE) {
                            // Si no está iniciada, la iniciamos
                            session_start();
                        }
                        $_SESSION['tipo_alert']="danger";
                        $_SESSION['mensaje']="Ingrese el campo del tipo de curso"; 
                        echo "<script>location.href='../views/registrarcurso.php'</script>"; 
                    }
                    
                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
                        // Si no está iniciada, la iniciamos
                        session_start();
                    }
                    $_SESSION['tipo_alert']="danger";
                    $_SESSION['mensaje']="Ingrese el campo de nombre"; 
                    echo "<script>location.href='../views/registrarcurso.php'</script>"; 
                }
            }else{
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    // Si no está iniciada, la iniciamos
                    session_start();
                }
                $_SESSION['tipo_alert']="danger";
                $_SESSION['mensaje']="Error"; 
                echo "<script>location.href='../views/registrarcurso.php'</script>"; 
            }
        }else{
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['tipo_alert']="danger";
            $_SESSION['mensaje']="Error"; 
            echo "<script>location.href='../views/registrarcurso.php'</script>"; 
        }
    }
    if(isset($_GET['eliminar_id'])){
        $idCurso = $_GET['eliminar_id'];
        $eliminar = $consulta->eliminar_curso($idCurso);
        if($eliminar){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
            }
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Curso eliminado correctamente";
            echo "<script>location.href='../views/registrarcurso.php'</script>";
        }
    }

    if(isset($_POST['comentarioApp'])){

        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $documentoTestimonio = $_SESSION['documento'];
      
        

        $comentarioTestimonio = (isset($_POST['comentarioApp']) ? $_POST['comentarioApp']:NULL);
        $puntuacionTestimonio = (isset($_POST['puntuacionTestimonio']) ? $_POST['puntuacionTestimonio']:NULL);
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d H:i:s");
        // var_dump($fecha);
        // die();

        $saveTestimonio = $consulta->SaveTestimonio($documentoTestimonio,$comentarioTestimonio,$puntuacionTestimonio,$fecha);
        if($saveTestimonio){
            //session_start();
            // $_SESSION['tipo_alert']="success";
            // $_SESSION['mensaje']="Usuario registrado correctamente";
            echo "<script>alert('Comentario hecho')</script>";
            echo "<script>location.href='../views/menuinstructor.php'</script>";
        }

    }

    if(isset($_POST['Rdescripciongaleria'])){
        $Renombregaleria = (isset($_POST['Renombregaleria']) ? $_POST['Renombregaleria']:NULL);
        $Rdescripciongaleria = (isset($_POST['Rdescripciongaleria']) ? $_POST['Rdescripciongaleria']:NULL);

        $nombre_foto= $_FILES['Rfotogaleria']['name'];
        // var_dump($nombre_foto);
        // die();
        $nombre_temporal=$_FILES['Rfotogaleria']['tmp_name'];
        $nuevo_nombre="sena".$Renombregaleria;
        $carpeta="../../index/assets/img/gallery/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;

        // var_dump($Rdescripciongaleria,$Rdescripciongaleria);
        // die();

        if(move_uploaded_file($nombre_temporal,$rutafinal)){
            $savegaleria = $consulta->guardar_galeria($Renombregaleria, $Rdescripciongaleria, $rutafinalSql);
    
    
            if($savegaleria){
                if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
                }
                $_SESSION['tipo_alert']="success";
                $_SESSION['mensaje']="Imagen registrada correctamente";
                echo "<script>location.href='../views/admingaleria.php'</script>";
            }
            }
    }

    
?>