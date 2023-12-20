<?php
    include("../models/mconsultas.php");
   
    $consulta = new Consultas(); // Objecto
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
    if(isset($_GET['M'])){   
        $file = "../Manuales/" . $_SESSION['rol'] . ".pdf";
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