<?php
    include("../models/mconsultas.php");
   
    $consulta = new Consultas(); // Objecto

    //$conInstructor = $consulta->conInstructor();

    

    $contarAprendices = $consulta->contarAprendices();
    $contarInstructores = $consulta->contarInstructores();
    $contarCoordinadores = $consulta->contarCoordinadores();
    $contarConvocatorias = $consulta->contarConvocatorias();

    $contar1 = $consulta->contar1();
    $contar2 = $consulta->contar2();
    $contar3 = $consulta->contar3();
    
    $hombres = $consulta->hombres();
    $mujeres = $consulta->mujeres();
    $indefinidos = $consulta->indefinidos();
    
    $adminhombres = $consulta->adminhombres();
    $adminmujeres = $consulta->adminmujeres();
    $adminindefinidos = $consulta->adminindefinidos();

    $contarTecnologo = $consulta->contarTecnologo();
    $contarTecnico = $consulta->contarTecnico();
    $contarComplementario = $consulta->contarComplementario();

    $contarJornadaDia = $consulta->contarJornadaDia();
    $contarJornadaTarde = $consulta->contarJornadaTarde();
    $contarJornadaNoche = $consulta->contarJornadaNoche();
    $contarJornadaVirtual = $consulta->contarJornadaVirtual();
    $contarJornadaFds = $consulta->contarJornadaFds();

    $tDocs = $consulta->tDoc();
    $meses = $consulta->meses();
    $roles = $consulta->rol();
    $tEstru = $consulta->tEstru();
    $poblacion = $consulta->poblacion();
    //$curso = $consulta->mostrarcurso();
    $tipoCurso = $consulta->mostrarTipoCurso();
    $genero = $consulta->genero();
    $convocatorias = $consulta->convocatorias();
    $jornada = $consulta->mostrarjornada();
    $user = $consulta->user();
    $dias = $consulta->dias();
    $depar=$consulta->get_depa();
    $convocatorias=$consulta->get_convocatorias();
    $aprendices = $consulta->aprendices();
    $eventos = $consulta->eventos();
    $galeria = $consulta->galeria();
    $nosotros = $consulta->get_nosotros();
    $comentarios = $consulta->cometarios();
    $contacto = $consulta->admcontacto();



    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }


    
    

    if(isset($_SESSION['fechaactual'])){
        $registrosmeses = $consulta->regitrosmeses($_SESSION['fechaactual']);
        $comentariosmeses = $consulta->comentariosmeses($_SESSION['fechaactual']);
        $contactomeses = $consulta->contactomeses($_SESSION['fechaactual']);
        // var_dump($registrosmeses);
        // die();
    }
    

    if(isset($_SESSION['documento'])){
        $notificaciones = $consulta->notificaciones($_SESSION['documento']);
    }


    if(isset($_SESSION['documento']) && $_SESSION['rol']==1){
       $filtroConvocatoria=$consulta->get_ones__convocatorias($_SESSION['documento']); 
       $contarAprendicesInstructor = $consulta->contarAprendicesInstructor($_SESSION['documento']);
       $contarConvocatoriasInstructor = $consulta->contarConvocatoriasInstructor($_SESSION['documento']);
       $contarJornadasInstructor1 = $consulta->contarJornadasInstructordia($_SESSION['documento']);
       $contarJornadasInstructor2 = $consulta->contarJornadasInstructortarde($_SESSION['documento']);
       $contarJornadasInstructor3 = $consulta->contarJornadasInstructornoche($_SESSION['documento']);
       $contarJornadasInstructor4 = $consulta->contarJornadasInstructorvirtual($_SESSION['documento']);
       $contarJornadasInstructor5 = $consulta->contarJornadasInstructorfds($_SESSION['documento']);
    }
    //$estructura=$consulta->estructura($_SESSION['convinfo'][0]['convocatorias']); 


    if(!empty($_GET['EstructuraCurricular'])){
        
        $ficha = $_GET['EstructuraCurricular'];

        $consultarCurso = $consulta->estructura($ficha);

        if($consultarCurso){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['estructurainfo'] = $consultarCurso;
            
            echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
        }else{
            // echo "<script>alert('No hay registrados en la convocatoria')</script>";
            echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
        }
    }
    
// Actualizar documento mayor de edad

if(isset($_POST['cambiodedocumento'])){

    $nDoc =$_SESSION['documento'];
    $cambio = (isset($_POST['cambiodedocumento']) ? $_POST['cambiodedocumento']:NULL);
    $formatos_permitidos =  array('pdf');
    $archivo = $_FILES['adocumento']['name'];
    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    $archivo2 = $_FILES['acertificado']['name'];
    $extension2 = pathinfo($archivo2, PATHINFO_EXTENSION);
    if(!in_array($extension, $formatos_permitidos) ) {
        echo "<script>alert('Extencion no permitida en el Archivo del Documento de Identidad')</script>";
        echo "<script>location.href='../views/menuinstructor.php'</script>";
    }elseif(!in_array($extension2, $formatos_permitidos)){
        echo "<script>alert('Extencion no permitida en el Archivo de Certificacion Del Documento de Identidad')</script>";
        echo "<script>location.href='../views/menuinstructor.php'</script>"; // PREGUNTAR AL REDIRECCIONAR QUE NO SE LIMPIE EL FORMULARIO
    }else{
        $maincarpeta = '../documentos/'. $nDoc . '/';
        if(!file_exists($maincarpeta)){
            mkdir($maincarpeta, 0007, true);
        }
        if($cambio != 2){
            $_SESSION['tipo_alert']="danger";
            $_SESSION['mensaje']="Tipo Documento incorrecto";
            echo "<script>location.href='../views/menuinstructor.php'</script>";
        }else{
            $nombre_temporal1=$_FILES['adocumento']['tmp_name'];
            $nuevo_nombre1="Documento_".$nDoc;
            $carpeta="../documentos/" . $nDoc . "/";
            $explode1=explode(".",$archivo);
            $extension_archivo1=".".array_pop($explode1);
            $rutafinal1=$carpeta.$nuevo_nombre1.$extension_archivo1;
            $rutafinalSql1=$nuevo_nombre1.$extension_archivo1;
            if(move_uploaded_file($nombre_temporal1,$rutafinal1)){
                $nombre_temporal2=$_FILES['acertificado']['tmp_name'];
                $nuevo_nombre2="Certificacion_Documento_".$nDoc;
                $carpeta2="../documentos/" . $nDoc . "/";
                $explode2=explode(".",$archivo2);
                $extension_archivo2=".".array_pop($explode2);
                $rutafinal2=$carpeta2.$nuevo_nombre2.$extension_archivo2;
                $rutafinalSql2=$nuevo_nombre2.$extension_archivo2;
                if(move_uploaded_file($nombre_temporal2,$rutafinal2)){
                    $actualizardocumento = $consulta->actualizardocu($cambio,$nDoc,$rutafinalSql1,$rutafinalSql2);
                    if($actualizardocumento){
                        $_SESSION['tipo_alert']="success";
                        $_SESSION['mensaje']="Documento editado correctamente"; 
                        echo "<script>location.href='../views/menuinstructor.php'</script>";  
                        unset($_SESSION['tipodocumento']);
                    }else{
                        $_SESSION['tipo_alert']="danger";
                        $_SESSION['mensaje']="Documento editado incorrectamente";
                        echo "<script>location.href='../views/menuinstructor.php'</script>";
                    }
                }
            }
        }

    }
}
    
   
// Editar usuario
    if(isset($_POST['etDoc'])){
        $enombre = (isset($_POST['enombre']) ? $_POST['enombre']:NULL);
        $eapellidos = (isset($_POST['eapellidos']) ? $_POST['eapellidos']:NULL);
        $etipoDoc = (isset($_POST['etDoc']) ? $_POST['etDoc']:NULL);
        $enumDoc = (isset($_POST['enDoc']) ? $_POST['enDoc']:NULL);
        $egenero = (isset($_POST['egenero']) ? $_POST['egenero']:NULL);
        $enumcelular = (isset($_POST['enumcelular']) ? $_POST['enumcelular']:NULL);
        $ecorreo = (isset($_POST['ecorreo']) ? $_POST['ecorreo']:NULL);
        $etpoblacion = (isset($_POST['etpoblacion']) ? $_POST['etpoblacion']:NULL);
        $erol = (isset($_POST['erol']) ? $_POST['erol']:NULL);
        //$ecurso = (isset($_POST['ecurso']) ? $_POST['ecurso']:NULL);
        //$ejornada = (isset($_POST['ejornada']) ? $_POST['ejornada']:NULL);
        $econtra = (isset($_POST['econtrasena']) ? $_POST['econtrasena']:NULL);
        $departamento = (isset($_POST['departamento']) ? $_POST['departamento']:NULL);
        $ciudad = (isset($_POST['Ciudad']) ? $_POST['Ciudad']:NULL);

        if($econtra !=""){
            $ncontra = sha1(md5($econtra));
        }else{
            $ncontra="";
        }
        $formatos_permitidos =  array('pdf','');
        $archivo = $_FILES['edocumento']['name'];
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        $archivo2 = $_FILES['ecertificado']['name'];
        $extension2 = pathinfo($archivo2, PATHINFO_EXTENSION);

        // var_dump($archivo,$archivo2);
        // die();
        if(!in_array($extension, $formatos_permitidos) ) {
            echo "<script>alert('Extencion no permitida en el Archivo del Documento de Identidad')</script>";
            echo "<script>location.href='../views/registrarusuario.php'</script>";
        }elseif(!in_array($extension2, $formatos_permitidos)){
            echo "<script>alert('Extencion no permitida en el Archivo de Certificacion Del Documento de Identidad')</script>";
            echo "<script>location.href='../views/registrarusuario.php'</script>"; // PREGUNTAR AL REDIRECCIONAR QUE NO SE LIMPIE EL FORMULARIO
        }else{
            $maincarpeta = '../documentos/'. $enumDoc . '/';
            if(!file_exists($maincarpeta)){
                mkdir($maincarpeta, 0007, true);
            }
            if(!empty($archivo)){
                $nombre_foto= $_FILES['edocumento']['name'];
                $nombre_temporal=$_FILES['edocumento']['tmp_name'];
                $nuevo_nombre="Documento_".$enumDoc;
                // $carpeta='../documentosConvocatorias/'. $fichaCurso . '/'. $enumDoc . '/';
                $explode=explode(".",$nombre_foto);
                $extension_archivo=".".array_pop($explode);
                $rutafinal=$maincarpeta.$nuevo_nombre.$extension_archivo;
                $rutafinalSql=$nuevo_nombre.$extension_archivo;
                move_uploaded_file($nombre_temporal,$rutafinal);
            }else{
                $rutafinalSql="";
            }
            if(!empty($_FILES['ecertificado']['name'])){
                $nombre_foto2= $_FILES['ecertificado']['name'];
                $nombre_temporal2=$_FILES['ecertificado']['tmp_name'];
                $nuevo_nombre2="Certificacion_Documento_".$enumDoc;
                //$carpeta="../../index/assets/img/gallery/";
                $explode2=explode(".",$nombre_foto2);
                $extension_archivo2=".".array_pop($explode2);
                $rutafinal2=$maincarpeta.$nuevo_nombre2.$extension_archivo2;
                $rutafinalSql2=$nuevo_nombre2.$extension_archivo2;
                move_uploaded_file($nombre_temporal2,$rutafinal2);
            }else{
                $rutafinalSql2="";
            }

            $saveUser = $consulta->editarUsuario($enombre,$eapellidos,$etipoDoc,$enumDoc,$egenero,$enumcelular,$ecorreo,$etpoblacion,$erol,$ncontra,$rutafinalSql,$rutafinalSql2,$departamento,$ciudad);


        }
        
        
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['userOne']);
        if($saveUser){
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Usuario editado correctamente";
            echo "<script>location.href='../views/registrarusuario.php'</script>";
        }
        

    }
// Fin editar usuario


    //convocatorias
    if(isset($_POST['nombre'])){
        $nombre = ucfirst(isset($_POST['nombre']) ? $_POST['nombre']:NULL); // Isset determina si esta definida
        $tCurso = (isset($_POST['tipoDeCurso']) ? $_POST['tipoDeCurso']:NULL);
        $codigo = (isset($_POST['ficha']) ? $_POST['ficha']:NULL);
        $id_jornada= (isset($_POST['id_jornada']) ? $_POST['id_jornada']:NULL);
        $fecha_inicio = (isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio']:NULL);
        $fecha_fin = (isset($_POST['fecha_fin']) ? $_POST['fecha_fin']:NULL);
        $descripcion = ucfirst(isset($_POST['descripcion']) ? $_POST['descripcion']:NULL);
        //$link = (isset($_POST['link']) ? $_POST['link']:NULL);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $nDoc =$_SESSION['documento'];
        //ubicacion foto
        $nombre_foto= $_FILES['fotoc']['name'];
        $nombre_temporal=$_FILES['fotoc']['tmp_name'];
        $nuevo_nombre="Curso_".$codigo;
        $carpeta="../img/convocatorias/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;

        //-----------------
        if(move_uploaded_file($nombre_temporal,$rutafinal)){
        $saveconvocatoria = $consulta->guardar_convocatorias($nombre,$tCurso,$codigo,$id_jornada,$fecha_inicio,$fecha_fin,$descripcion,$rutafinalSql,$nDoc);


        if($saveconvocatoria){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
            }
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Convocatoria registrada correctamente";
            echo "<script>location.href='../views/convocatorias.php'</script>";
        }
        }
    }

    // Editar Convocatoria
    if(isset($_POST['idconv'])){
        $nDoc=$_SESSION["documento"];
        $id=$_POST['idconv'];
        $nombre = ucfirst(isset($_POST['ecnombre']) ? $_POST['ecnombre']:NULL); // Isset determina si esta definida
        $tipoCur = (isset($_POST['etipoCurso']) ? $_POST['etipoCurso']:NULL);
        $id_jornada= (isset($_POST['ecid_jornada']) ? $_POST['ecid_jornada']:NULL);
        $codigo = (isset($_POST['eficha']) ? $_POST['eficha']:NULL);
        $fecha_inicio = (isset($_POST['ecfecha_inicio']) ? $_POST['ecfecha_inicio']:NULL);
        $fecha_fin = (isset($_POST['ecfecha_fin']) ? $_POST['ecfecha_fin']:NULL);
        $descripcion = ucfirst(isset($_POST['ecdescripcion']) ? $_POST['ecdescripcion']:NULL);
        //$link = (isset($_POST['eclink']) ? $_POST['eclink']:NULL);
        //ubicacion foto
        if(!empty($_FILES['ecfoto']['name'])){
        $nombre_foto= $_FILES['ecfoto']['name'];
        $nombre_temporal=$_FILES['ecfoto']['tmp_name'];
        $nuevo_nombre="Curso_".$codigo;
        $carpeta="../img/convocatorias/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
        move_uploaded_file($nombre_temporal,$rutafinal);
        }else{
            $rutafinalSql="";
        }
        //-------------
        $saveconv = $consulta->editarconv($nDoc,$id,$nombre,$tipoCur,$id_jornada,$codigo,$fecha_inicio,$fecha_fin,$descripcion,$rutafinalSql);
       


        if($saveconv){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Convocatoria Editada correctamente";
            unset($_SESSION['convOne']);
            echo "<script>location.href='../views/convocatorias.php'</script>";
        }
        
    }
    // FIN Editar Convocatoria

    if(isset($_GET['cancelEdit'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['userOne']);
        unset($_SESSION['muni']);
        echo "<script>location.href='../views/registrarusuario.php'</script>";
    }
  
    if(isset($_GET['cancelEditconv'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['convOne']);
        echo "<script>location.href='../views/convocatorias.php'</script>";
    }

    if(isset($_GET['cancelarcsv'])){
        echo "<script>location.href='../views/registrarusuario.php'</script>";
    }

 

    if(isset($_GET['editUser'])){
         
        $idUser = $_GET['editUser'];
        $UsuarioOne = $consulta->editarUsuarioone($idUser);
        $municipios=$consulta->get_muni($_GET['depar']);
        // var_dump($UsuarioOne);
        // die();
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['userOne'] =$UsuarioOne;
        $_SESSION['muni']=$municipios;
        echo "<script>location.href='../views/registrarusuario.php'</script>";

    }

// Editar Nosotros

if(isset($_GET['editarnosotros'])){
         
    $idco = $_GET['editarnosotros'];
    $nosotrosOne = $consulta->editarnosotrosone($idco);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    $_SESSION['nosotrosOne'] =$nosotrosOne;
    echo "<script>location.href='../views/adminAcercaDeNosotros.php'</script>";

}
if(isset($_GET['canceleditarnosotros'])){
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    unset($_SESSION['nosotrosOne']);
    echo "<script>location.href='../views/adminAcercaDeNosotros.php'</script>";
}

// Fin

// Editar eventos -----------
    if(isset($_GET['editarevento'])){
         
        $idco = $_GET['editarevento'];
        $eventoOne = $consulta->editareventoone($idco);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['eventoOne'] =$eventoOne;
        echo "<script>location.href='../views/admineventos.php'</script>";

    }
    if(isset($_GET['canceleditarevento'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['eventoOne']);
        echo "<script>location.href='../views/admineventos.php'</script>";
    }
    // registrar evento
    if(isset($_POST["nombreevento"])){
        $nombreevento = (isset($_POST['nombreevento']) ? $_POST['nombreevento']:NULL);
        $fechaevento = (isset($_POST['fechaevento']) ? $_POST['fechaevento']:NULL);
        $descripcionevento = (isset($_POST['descripcionevento']) ? $_POST['descripcionevento']:NULL);

    if(!empty($_FILES['fotoevento'])){
        $nombre_fotoeve= $_FILES['fotoevento']['name'];
        $nombre_temporal=$_FILES['fotoevento']['tmp_name'];
        $nuevo_nombre="Evento_".$nombreevento;
        $carpeta="../../index/assets/img/eventos/";
        $explode=explode(".",$nombre_fotoeve);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
    }
    
        

        if(move_uploaded_file($nombre_temporal,$rutafinal)){
            $saveevnto = $consulta->guardar_evento($nombreevento, $fechaevento, $descripcionevento, $rutafinalSql);
            if($saveevnto) {
                
                echo "<script>alert('Evento guardado correctamente')</script>";
                echo "<script>location.href='../views/admineventos.php'</script>";
            }else{
                echo "<script>alert('Error')</script>";
                echo "<script>location.href='../views/admineventos.php'</script>";
            }
        }
    }
    // FIN registrar evento
    // EDITAR evento
    if(isset($_POST["ecnombreevento"])){
        $idevento = (isset($_POST['idevento']) ? $_POST['idevento']:NULL);
        $ecnombreevento = (isset($_POST['ecnombreevento']) ? $_POST['ecnombreevento']:NULL);
        $ecfechaevento = (isset($_POST['ecfechaevento']) ? $_POST['ecfechaevento']:NULL);
        $ecdescripcionevento = (isset($_POST['ecdescripcionevento']) ? $_POST['ecdescripcionevento']:NULL);

    if(!empty($_FILES['ecfotoevento']['name'])){
        $nombre_foto= $_FILES['ecfotoevento']['name'];
        $nombre_temporal=$_FILES['ecfotoevento']['tmp_name'];
        $nuevo_nombre="Evento_".$codigo;
        $carpeta="../../index/assets/img/eventos/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
        move_uploaded_file($nombre_temporal,$rutafinal);
    }else{
        $rutafinalSql="";
    }
    $editarEvento = $consulta->editarevento($idevento, $ecnombreevento,$ecfechaevento,$ecdescripcionevento,$rutafinalSql);
    if($editarEvento) {
        unset($_SESSION['eventoOne']);
        echo "<script>alert('Evento editado correctamente')</script>";
        echo "<script>location.href='../views/admineventos.php'</script>";
    }else{
        echo "<script>alert('Error')</script>";
        echo "<script>location.href='../views/admineventos.php'</script>";
    }

        
    }
    // FIN editar evento

    // Eliminar evento
    if(isset($_GET['eliminar_evento'])){
        $id = $_GET['eliminar_evento'];
        $eliminar = $consulta->eliminar_evento($id);
        if($eliminar){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }   
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Evento eliminado correctamente";
            echo "<script>location.href='../views/admineventos.php'</script>";
        }
    }
    // FIN eliminar evento
    
// fin ----------------


// Eliminar comentario

if(isset($_GET['eliminar_comentario'])){
    $id = $_GET['eliminar_comentario'];
    $eliminar = $consulta->eliminar_comentario($id);
    if($eliminar){
        if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }   
        $_SESSION['tipo_alert']="success";
        $_SESSION['mensaje']="Comentario eliminado correctamente";
        echo "<script>location.href='../views/admincomentarios.php'</script>";
    }
}

if(isset($_GET['eliminar_contacto'])){
    $id = $_GET['eliminar_contacto'];
    $eliminar = $consulta->eliminar_contacto($id);
    if($eliminar){
        if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }   
        $_SESSION['tipo_alert']="success";
        $_SESSION['mensaje']="Comentario eliminado correctamente";
        echo "<script>location.href='../views/admincontacto.php'</script>";
    }
}

// Fin eliminar comentario
  
// plantilla carga masiva usuarios

if(isset($_GET['plantilla'])){   
        $file = "../cargaMasiva/plantilla.xlsx";
        if (is_file($file)) {
            $filename = "Plantilla_Carga_Masiva.xlsx"; // el nombre con el que se descargará, puede ser diferente al original
            /*header("Content-Type: application/octet-stream");*/
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            readfile($file);
        } else {
            die("Error: no se encontró el archivo '$file'");
        }    
    }


    if(isset($_GET['editconv'])){
        $nDoc=$_SESSION["documento"];
        $idco = $_GET['editconv'];
        $convocatoriaOne = $consulta->editarconvocatoriaone($nDoc,$idco);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['convOne'] =$convocatoriaOne;
        echo "<script>location.href='../views/convocatorias.php'</script>";

    }
    if(isset($_POST['action'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");
        $archivo=$_FILES['excel']['name'];
        $tipo=$_FILES['excel']['type'];
        $destino="adso_".$archivo;
        if(copy($_FILES['excel']['tmp_name'],$destino)){}
        else{}
        
        if (file_exists("adso_".$archivo)){
            require_once('../vendor/PHPExcel/Classes/PHPExcel.php');
            require_once('../vendor/PHPExcel/Classes/PHPExcel/Reader/Excel2007.php');
        }
        $objReader = new PHPExcel_reader_Excel2007();
        $objPHPExcel = $objReader->load($destino);
        // $objFecha=new PHPExcel_Shared_Date();
        $objPHPExcel->setActiveSheetIndex(0);
        $columnas=$objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
        $filas=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        // var_dump($filas);
        // die();

        // inicio de for
        for($i=2;$i<=$filas;$i++){
            if ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue() != null && $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue() != null) {
                # code...
            $_DATA_EXCEL[$i]["nDoc"]= $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["tDoc"]=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["rol"]=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["nombre"]=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["apellidos"]=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["genero"]=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["numerocel"]=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["correo"]=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["tpoblacion"]=$objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
            $_DATA_EXCEL[$i]["fechanacimiento"]=$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
            }
        }
        // var_dump( $_DATA_EXCEL);
        // die();
        $errores=0;
        foreach($_DATA_EXCEL as $campo => $value){
            $sql = "INSERT INTO person (nDoc,tDoc,rol,nombre,apellidos,genero,numerocel,correo,tpoblacion,fechanacimiento,contrasena,fechaper,id_depa,id_muni) VALUES (";
                foreach($value as $campo2 => $value2){
                    if($campo2=="nDoc"){$pass= sha1(md5($value2)); $sql.="$value2";}
                    else if($campo2=="nombre"){$sql.=",'$value2'";}
                    else if($campo2=="apellidos"){$sql.=",'$value2'";} 
                    else if($campo2=="correo"){$sql.=",'$value2'";}
                    else if($campo2=="fechanacimiento"){ $sql.=",'$value2'";}  
                    else{$sql.=",$value2";}
                }
// . date($format = "Y-m-d", strtotime( date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value2)) ."+ 1 days")).
                $sql.=",'$pass'".",'$fecha', ". $_SESSION['departamento'] ." , ". $_SESSION['municipio'].");";
                // var_dump($sql);
                // die();
                
                $insert=$consulta->guardar_carga_masiva_usuario($sql);
        }
                // var_dump($sql);
                // die();
            if($insert){
                    if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
                    $_SESSION['tipo_alert']="success";
                    $_SESSION['mensaje']="Carga masiva exitosa";
                    echo "<script>location.href='../views/registrarusuario.php?cargamasiva=true'</script>";
                }else{
                    if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
                    $_SESSION['tipo_alert']="danger";
                    $_SESSION['mensaje']="Error al cargar";
                    echo "<script>location.href='../views/registrarusuario.php?cargamasiva=true'</script>";
                }


        // cierra el files

    }//cierre post action

    if(isset($_GET['eliminar_id'])){
        $idUsuario = $_GET['eliminar_id'];
        $eliminar = $consulta->eliminar_usuario($idUsuario);
        if($eliminar){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
            echo "<script>location.href='../views/registrarusuario.php'</script>";
        }
    }
    if(isset($_GET['eliminar_conv'])){
        $nDoc=$_SESSION["documento"];
        $id = $_GET['eliminar_conv'];
        $eliminar = $consulta->eliminar_convocatoria($nDoc,$id);
        if($eliminar){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }   
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Convocatoria eliminada correctamente";
            echo "<script>location.href='../views/convocatorias.php'</script>";
        }
    }



    // Editar acerca de nosotros
    if(isset($_POST["primerTexto"])){
        $primerTexto = (isset($_POST['primerTexto']) ? $_POST['primerTexto']:NULL);
        $segundoTexto = (isset($_POST['segundoTexto']) ? $_POST['segundoTexto']:NULL);
        // $ecfechaevento = (isset($_POST['ecfechaevento']) ? $_POST['ecfechaevento']:NULL);
        // $ecdescripcionevento = (isset($_POST['ecdescripcionevento']) ? $_POST['ecdescripcionevento']:NULL);

    if(!empty($_FILES['fotoPrincipal']['name'])){
        $nombre_foto= $_FILES['fotoPrincipal']['name'];
        $nombre_temporal=$_FILES['fotoPrincipal']['tmp_name'];
        $nuevo_nombre="fotoPrincipal";
        $carpeta="../../index/assets/img/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
        move_uploaded_file($nombre_temporal,$rutafinal);
    }else{
        $rutafinalSql="";
    }
    if(!empty($_FILES['fotoSegundaria']['name'])){
        $nombre_foto2= $_FILES['fotoSegundaria']['name'];
        $nombre_temporal2=$_FILES['fotoSegundaria']['tmp_name'];
        $nuevo_nombre2="fotoSegundaria";
        $carpeta2="../../index/assets/img/";
        $explode2=explode(".",$nombre_foto2);
        $extension_archivo2=".".array_pop($explode2);
        $rutafinal2=$carpeta2.$nuevo_nombre2.$extension_archivo2;
        $rutafinalSql2=$nuevo_nombre2.$extension_archivo2;
        move_uploaded_file($nombre_temporal2,$rutafinal2);
    }else{
        $rutafinalSql2="";
    }
    $editarAcercadenosotros = $consulta->editarAcercadenosotros($primerTexto,$segundoTexto,$rutafinalSql,$rutafinalSql2);
    if($editarAcercadenosotros) {
        unset($_SESSION['nosotrosOne']);
        echo "<script>alert('Editado correctamente')</script>";
        echo "<script>location.href='../views/adminAcercaDeNosotros.php'</script>";
    }else{
        echo "<script>alert('Error')</script>";
        echo "<script>location.href='../views/adminAcercaDeNosotros.php'</script>";
    }    
    }
    // Fin 

    // Galeria

    // Registrar una Imagen


    // Fin

    // Editar Galeria
    if(isset($_POST["nombregaleria"])){
        $nombregaleria = (isset($_POST['nombregaleria']) ? $_POST['nombregaleria']:NULL);
        $descripciongaleria = (isset($_POST['descripciongaleria']) ? $_POST['descripciongaleria']:NULL);
        $idgaleria = (isset($_POST['idgaleria']) ? $_POST['idgaleria']:NULL);
        // var_dump($nombregaleria);
        // die();

    if(!empty($_FILES['fotogaleria']['name'])){
        $nombre_foto= $_FILES['fotogaleria']['name'];
        $nombre_temporal=$_FILES['fotogaleria']['tmp_name'];
        $nuevo_nombre="sena".$idgaleria;
        $carpeta="../../index/assets/img/gallery/";
        $explode=explode(".",$nombre_foto);
        $extension_archivo=".".array_pop($explode);
        $rutafinal=$carpeta.$nuevo_nombre.$extension_archivo;
        $rutafinalSql=$nuevo_nombre.$extension_archivo;
        move_uploaded_file($nombre_temporal,$rutafinal);
    }else{
        $rutafinalSql="";
    }
    $editarGaleria = $consulta->editargaleria($idgaleria, $nombregaleria,$descripciongaleria,$rutafinalSql);
    if($editarGaleria) {
        unset($_SESSION['galeriaOne']);
        echo "<script>alert('Imagen editada correctamente')</script>";
        echo "<script>location.href='../views/admingaleria.php'</script>";
    }else{
        echo "<script>alert('Error')</script>";
        echo "<script>location.href='../views/admingaleria.php'</script>";
    }

        
    }
    // Fin Editar
    if(isset($_GET['editargaleria'])){
         
        $idga = $_GET['editargaleria'];
        $galeriaOne = $consulta->editargaleriaone($idga);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['galeriaOne'] =$galeriaOne;
        echo "<script>location.href='../views/admingaleria.php'</script>";

    }
    if(isset($_GET['canceleditargaleria'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['galeriaOne']);
        echo "<script>location.href='../views/admingaleria.php'</script>";
    }

    // Eliminar galeria
    if(isset($_GET['eliminar_galeria'])){
        $id = $_GET['eliminar_galeria'];
        $eliminar = $consulta->eliminar_galeria($id);
        if($eliminar){
            if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }   
            $_SESSION['tipo_alert']="success";
            $_SESSION['mensaje']="Imagen eliminada correctamente";
            echo "<script>location.href='../views/admingaleria.php'</script>";
        }
    }
    // Fin

    if(isset($_GET['idRegistrados'])){
        $codigocur = (isset($_GET['idRegistrados']) ? $_GET['idRegistrados']:NULL);
        
        $consultarCurso = $consulta->ConsultarConvocatoria($codigocur);

        if($consultarCurso){
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['convinfo'] = $consultarCurso;
            
            echo "<script>location.href='../views/RegistroConvocatoria.php'</script>";
        }else{
            echo "<script>alert('No hay registrados en la convocatoria')</script>";
            echo "<script>location.href='../views/convocatorias.php'</script>";
        }
    }

    if(isset($_GET['editarUsuariosConv'])){
         
        $idUsucon = $_GET['editarUsuariosConv'];
        $nosotrosOne = $consulta->editarConvocatoriaUsuarioone($idUsucon);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['editConvUserOne'] =$nosotrosOne;
        echo "<script>location.href='../views/RegistroConvocatoria.php'</script>";
    }
    if(isset($_GET['canceleditarUsuariosConv'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['editConvUserOne']);
        echo "<script>location.href='../views/RegistroConvocatoria.php'</script>";
    }

    if(isset($_GET['documento'])){
        $nDoc = $_GET['nDoc'];
        $documento = $_GET['documento'];   
        
        
        $file = "../documentos/" . $nDoc . "/" . $documento;
        // var_dump($file);
        // die();
        if (is_file($file)) {
          $filename = "DocumentoIdentidad_". $nDoc .".pdf"; // el nombre con el que se descargará, puede ser diferente al original
          /*header("Content-Type: application/octet-stream");*/
          header("Content-Type: application/force-download");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          readfile($file);
        } else {
          die("Error: no se encontró el archivo '$file'");
        }    
    }

    if(isset($_GET['certificado'])){
        $nDoc = $_GET['nDoc'];
        $documento = $_GET['certificado'];   
        
        $file = "../documentos/" . $nDoc . "/" . $documento;
        // var_dump($file);
        // die();
        if (is_file($file)) {
          $filename = "CertificadoDocumentoIdentidad_". $nDoc .".pdf"; // el nombre con el que se descargará, puede ser diferente al original
          /*header("Content-Type: application/octet-stream");*/
          header("Content-Type: application/force-download");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          readfile($file);
        } else {
          die("Error: no se encontró el archivo '$file'");
        }    
    }

    if(isset($_GET['x'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['x'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/perfil.php'</script>";
    }
    if(isset($_GET['cancelx'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['x']);
        echo "<script>location.href='../views/perfil.php'</script>";
    }
    if(isset($_GET['y'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['y'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/perfil.php'</script>";
    }
    if(isset($_GET['cancely'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['y']);
        echo "<script>location.href='../views/perfil.php'</script>";
    }
    if(isset($_GET['z'])){  
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['z'] = 1;
        // var_dump($_SESSION['h']);
        // die();
        echo "<script>location.href='../views/perfil.php'</script>";
    }
    if(isset($_GET['cancelz'])){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['z']);
        echo "<script>location.href='../views/perfil.php'</script>";
    }

?>