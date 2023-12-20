<?php 

include("../models/mEditConvocatoriasReg.php");
   
$consulta = new Consultas(); // Objecto

// Editar usuario Registrados en Convocatorias Interfaz de Instructor
if(isset($_POST['idEditarUsuarioConv'])){
    $eid = (isset($_POST['idEditarUsuarioConv']) ? $_POST['idEditarUsuarioConv']:NULL);
    $enombre = ucwords(isset($_POST['Nombres']) ? $_POST['Nombres']:NULL);
    $eapellidos = ucwords(isset($_POST['Apellidos']) ? $_POST['Apellidos']:NULL);
    $etipoDoc = (isset($_POST['tDoc']) ? $_POST['tDoc']:NULL);
    $enumDoc = (isset($_POST['nDoc']) ? $_POST['nDoc']:NULL);
    $efechaNacimiento = (isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento']:NULL);
    $etpoblacion = (isset($_POST['etpoblacion']) ? $_POST['etpoblacion']:NULL);
    $enumcelular = (isset($_POST['nCelular']) ? $_POST['nCelular']:NULL);
    $ecorreo = (isset($_POST['correo']) ? $_POST['correo']:NULL);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    } 
    $fichaCurso = $_SESSION['convinfo'][0]['convocatorias'];


    $formatos_permitidos =  array('pdf','');
    $archivo = $_FILES['documento']['name'];
    // var_dump($archivo);
    // die();
    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    $archivo2 = $_FILES['certificado']['name'];
    $extension2 = pathinfo($archivo2, PATHINFO_EXTENSION);
    if(!in_array($extension, $formatos_permitidos) ) {
        echo "<script>alert('Extencion no permitida en el Archivo del Documento de Identidad')</script>";
        echo "<script>location.href='../views/RegistroConvocatoria.php'</script>";
    }elseif(!in_array($extension2, $formatos_permitidos)){
        echo "<script>alert('Extencion no permitida en el Archivo de Certificacion Del Documento de Identidad')</script>";
        echo "<script>location.href='../views/RegistroConvocatoria.php'</script>"; // PREGUNTAR AL REDIRECCIONAR QUE NO SE LIMPIE EL FORMULARIO
    }else{
        
        $maincarpeta = '../documentos/'. $enumDoc . '/';
            if(!file_exists($maincarpeta)){
                mkdir($maincarpeta, 0007, true);
            }
            if(!empty($archivo)){
                $nombre_foto= $_FILES['documento']['name'];
                $nombre_temporal=$_FILES['documento']['tmp_name'];
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
            if(!empty($_FILES['certificado']['name'])){
                $nombre_foto2= $_FILES['certificado']['name'];
                $nombre_temporal2=$_FILES['certificado']['tmp_name'];
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

                // $departamento = (isset($_POST['departamento']) ? $_POST['departamento']:NULL);
                // $ciudad = (isset($_POST['Ciudad']) ? $_POST['Ciudad']:NULL);

        $saveUser = $consulta->editarUsuarioConvocatoria($eid,$enombre,$eapellidos,$etipoDoc,$enumDoc,$etpoblacion,$efechaNacimiento,$enumcelular,$ecorreo,$rutafinalSql,$rutafinalSql2);

    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    
    
    if($saveUser){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        unset($_SESSION['editConvUserOne']);

        $_SESSION['convinfo'][0]['nombre']=$enombre;
        $_SESSION['convinfo'][0]['apellidos']=$eapellidos;
        // $_SESSION['tipo_alert']="success";
        // $_SESSION['mensaje']="Usuario editado correctamente";
        echo "<script>alert('Usuario Editado Correctamente')</script>";
        echo "<script>location.href='../views/RegistroConvocatoria.php'</script>";
    }
    }
    
}
// Fin editar usuario

?>