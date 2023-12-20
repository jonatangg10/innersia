<?php 

include("../models/mEstructura.php");
   
$consulta = new Consultas(); // Objecto


if(isset($_POST['eNombre'])){
    //$enombre = ucwords(isset($_POST['eNombre']) ? $_POST['eNombre']:NULL);

    $N = strtolower(isset($_POST['eNombre']) ? $_POST['eNombre']:NULL);

    $enombre = ucfirst($N);

    $tCom = (isset($_POST['tCom']) ? $_POST['tCom']:NULL);
    $rApre = (isset($_POST['rApre']) ? $_POST['rApre']:NULL);
    $hTotal = (isset($_POST['hTotal']) ? $_POST['hTotal']:NULL);
    $idEstructura = (isset($_POST['idEstructura']) ? $_POST['idEstructura']:NULL);

    $editar = $consulta->editarEstructura($enombre,$tCom,$rApre,$hTotal,$idEstructura);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    $ficha =$_SESSION['convinfo'][0]['convocatorias'];
    $estructuramas = $consulta->estructuramas($ficha);
    
    if($editar){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // Si no está iniciada, la iniciamos
            session_start();
        }
        $_SESSION['estructurainfo'] = $estructuramas;
        unset($_SESSION['editEstructura']);
        $_SESSION['tipo_alert']="success";
        $_SESSION['mensaje']="Competencia Editada Correctamente";
        echo "<script>location.href='../views/EstructuraCurricular.php'</script>";
    }

}


?>