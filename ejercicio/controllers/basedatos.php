<?php
    include("../models/mconsultas.php");
   
    $consulta = new Consultas(); // Objecto

    include('Fuction_Backup.php');

    echo backup_tables('localhost','root','','safiro');

    date_default_timezone_set('America/Bogota');
    $fecha=date("Y-m-d");
    header("Content-disposition: attachment; filename=safiro-backup-".$fecha.".sql");
    header("Content-type: MIME");
    readfile("../Innersia-".$fecha.".sql");   

?>