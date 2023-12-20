<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
    
    if(!isset($_SESSION['rol'])){
        session_destroy();
        echo "<script>location.href='../views/index.php'</script>";
        exit();
    }
    
?>