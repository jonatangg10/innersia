<?php
include 'conexion.php';

class Pdf{
    public function Acta($nDoc){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM person WHERE  nDoc=$nDoc";
        // $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
        // c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion
        // FROM registroconv AS registro
        // INNER JOIN person AS p ON p.Ndoc=registro.nDocreg
        // INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
        // INNER JOIN tipocurso AS tipo ON tipo.id=c.tCurso
        // WHERE  nDocreg=$nDoc";

        $result = $conexion->prepare($sql);

        $result->execute();
        //$resultado = false;
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
        return $resultado;
    }

}

?>