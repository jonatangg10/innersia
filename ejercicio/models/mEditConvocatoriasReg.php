<?php
    include("conexion.php");
    class Consultas{
        public function editarUsuarioConvocatoria($eid,$enombre,$eapellidos,$etipoDoc,$enumDoc,$etpoblacion,$efechaNacimiento,$enumcelular,$ecorreo,$rutafinalSql,$rutafinalSql2){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            if($rutafinalSql!="" && $rutafinalSql2!=""){
                $sql = "UPDATE `person` SET `nDoc`=$enumDoc,`tDoc`=$etipoDoc,`nombre`='$enombre',`apellidos`='$eapellidos', `numerocel`=$enumcelular, `correo`='$ecorreo',`tpoblacion`=$etpoblacion, `fechanacimiento`='$efechaNacimiento', documentoPdf='$rutafinalSql', registraduriaDocu='$rutafinalSql2' WHERE `id`=$eid";
            }elseif($rutafinalSql!=""){
                $sql = "UPDATE `person` SET `nDoc`=$enumDoc,`tDoc`=$etipoDoc,`nombre`='$enombre',`apellidos`='$eapellidos', `numerocel`=$enumcelular, `correo`='$ecorreo',`tpoblacion`=$etpoblacion, `fechanacimiento`='$efechaNacimiento', documentoPdf='$rutafinalSql' WHERE `id`=$eid";
            }elseif($rutafinalSql2!=""){
                $sql = "UPDATE `person` SET `nDoc`=$enumDoc,`tDoc`=$etipoDoc,`nombre`='$enombre',`apellidos`='$eapellidos', `numerocel`=$enumcelular, `correo`='$ecorreo',`tpoblacion`=$etpoblacion, `fechanacimiento`='$efechaNacimiento', registraduriaDocu='$rutafinalSql2' WHERE `id`=$eid";
            }elseif($rutafinalSql=="" && $rutafinalSql2==""){
                $sql = "UPDATE `person` SET `nDoc`=$enumDoc,`tDoc`=$etipoDoc,`nombre`='$enombre',`apellidos`='$eapellidos', `numerocel`=$enumcelular, `correo`='$ecorreo',`tpoblacion`=$etpoblacion, `fechanacimiento`='$efechaNacimiento'  WHERE `id`=$eid";
            }
            // $sql = "UPDATE `registroconv` SET `nDocreg`=$enumDoc,`tDocreg`=$etipoDoc,`nombrereg`='$enombre',`apellidosreg`='$eapellidos', `numerocelreg`=$enumcelular, `correo`='$ecorreo', `fechanacimiento`='$efechaNacimiento' WHERE `id`=$eid";
            // var_dump($sql);
            // die();
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }
    }
    // Ejemplo para la parte de municipios y departamentos
    // if($ncontra!=""){
    //     $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol, curso=$ecurso, nombrejornada=$ejornada, contrasena='$ncontra', id_depa=$departamento , id_muni=$ciudad WHERE nDoc=$enumDoc";
    // }else{
    //     $sql = "UPDATE person SET tDoc=$etipoDoc, nombre='$enombre', apellidos='$eapellidos',`numerocel`=$enumcelular,`correo`='$ecorreo', rol=$erol, curso=$ecurso, nombrejornada=$ejornada , id_depa=$departamento , id_muni=$ciudad  WHERE nDoc=$enumDoc";
    // }
?>