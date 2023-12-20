<?php

include("../models/conexion.php");
    class Usuario{
        public function login($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE nDoc=$ndoc";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
        public function convocatorias($ndoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT c.*, tc.tipoCurso
            FROM convocatorias AS c 
            INNER JOIN tipocurso AS tc ON c.tCurso=tc.id
             WHERE c.nDoc_responsable=$ndoc";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
    }

?>