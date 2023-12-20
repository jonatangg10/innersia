<?php
include('../../models/mconsultas.php');
$consulta= new Consultas;

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $horaleido = $_POST['fechaleido'];
    $estado = "leido";

    if(empty($horaleido)){
    
    date_default_timezone_set('America/Bogota');
    $horaleido = date("Y-m-d h:i:s");

    $leido = $consulta->mensajeleido($id,$estado,$horaleido);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }      
    echo "no leido";
}else{
    $leido = $consulta->mensajeleido($id,$estado,$horaleido);
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }      
    echo "ya leido";

}


}



?>