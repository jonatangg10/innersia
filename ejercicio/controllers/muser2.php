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

        public function regUser($nDoc,$fichaCurso,$fecha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO `registroconv`(`nDocreg`, `convocatorias`, `fechareg`)
                    VALUES ($nDoc, $fichaCurso, '$fecha')";
        
            $result = $conexion->prepare($sql);
            
            $result->execute();
            // $resultado = false;
            return $result;
        }

        public function comprobar($ndoc,$fichaCurso){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM registroconv WHERE nDocreg=$ndoc AND convocatorias=$fichaCurso";
            
            
            $result = $conexion->prepare($sql);
            $result->execute();
            //$result = false;
            return $result;
        }
    }

?>