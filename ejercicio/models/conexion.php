<?php
//session_start();
    class conexion{       
        public function get_conexion(){
            include('configuracion.php');
            $conexion= new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            return $conexion;
        }
    }

?>