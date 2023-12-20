<?php 

include("../models/mEstructura.php");
   
$consulta = new Consultas(); // Objecto

if(isset($_POST['Nombre'])){
    $N = strtolower(isset($_POST['Nombre']) ? $_POST['Nombre']:NULL);

    $Nombre = ucfirst($N);
    
    $tCompetencia = (isset($_POST['tCompetencia']) ? $_POST['tCompetencia']:NULL);
    $nResulA = (isset($_POST['nResulA']) ? $_POST['nResulA']:NULL);
    $tHoras = (isset($_POST['tHoras']) ? $_POST['tHoras']:NULL);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    $ficha =$_SESSION['convinfo'][0]['convocatorias'];

    $estructura = $consulta->estrutura($Nombre,$tCompetencia,$nResulA,$tHoras,$ficha);

    $estructuramas = $consulta->estructuramas($ficha);

     $_SESSION['estructurainfo'] = $estructuramas;

    if($estructura) {
        
        $_SESSION['tipo_alert']="success";
        $_SESSION['mensaje']="Competencia Registrada Correctamente";
        echo "<script>location.href='../views/EstructuraCurricular.php'</script>";

    }else{
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="Error";
        echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
    }


}


if(isset($_GET['editar'])){
    $ids = $_GET['editar'];
    $nosotrosOne = $consulta->editar($ids);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    $_SESSION['editEstructura'] =$nosotrosOne;
    echo "<script>location.href='../views/EstructuraCurricular.php'</script>";

}
if(isset($_GET['cancelar'])){
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    unset($_SESSION['editEstructura']);
    echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
}

if(isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    $ficha = $_GET['ficha'];
    $eliminar = $consulta->eliminar($id);

    $estructuramas = $consulta->estructuramas($ficha);

    if($eliminar){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['estructurainfo'] = $estructuramas;
        echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
    }
}

?>