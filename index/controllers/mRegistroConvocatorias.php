<?php
    include("conexion.php");
    class Consultas{
        public function guardar_usuario($nombre,$apellidos,$tipoDoc,$numDoc,$numeroCel,$correo,$rol,$poblacion,
                                                            $fecha,$fechaNacimiento,$departamento,
                                                            $ciudad,$rutafinalSql1,$rutafinalSql2,$ncontra){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            $sql = "INSERT INTO person ( `nDoc`, `tDoc`, `nombre`, `apellidos`, `numerocel`, `correo`,`tpoblacion`, `rol`, `fechaper`, `fechanacimiento`, `documentoPdf`, `registraduriaDocu`, `contrasena`, `id_depa`, `id_muni`)
            VALUES ($numDoc,$tipoDoc,'$nombre','$apellidos',$numeroCel,'$correo',$rol,$poblacion,'$fecha','$fechaNacimiento','$rutafinalSql1','$rutafinalSql2','$ncontra',$departamento,$ciudad)";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;
            
        }
        public function guardar($nombre,$apellidos,$genero,$tipoDoc,$numDoc,$numeroCel,$correo,$rol,$poblacion,
                                    $fecha,$fechaNacimiento,$departamento,
                                    $ciudad,$rutafinalSql1,$rutafinalSql2,$ncontra){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $sql = "INSERT INTO `person`( `nDoc`, `tDoc`, `nombre`, `apellidos`,`genero`, `numerocel`, `correo`, `rol`, `tpoblacion`, `fechaper`, `fechanacimiento`, `documentoPdf`, `registraduriaDocu`, `contrasena`, `id_depa`, `id_muni`) 
                VALUES($numDoc,$tipoDoc,'$nombre','$apellidos',$genero,$numeroCel,'$correo',$rol,$poblacion,'$fecha','$fechaNacimiento','$rutafinalSql1','$rutafinalSql2','$ncontra',$departamento,$ciudad)";
        // var_dump($sql);
        // die();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result;

        }
        public function existe($numDoc){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM person WHERE nDoc=$numDoc";

            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = null;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
        }
    }