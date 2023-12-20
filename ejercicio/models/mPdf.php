<?php
include 'conexion.php';

class Pdf{
    public function Productos(){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT per.*, td.nombretd, r.nombrerol, de.nombreDepartamento , ci.nombreCiudad 
        FROM person AS per 
        LEFT JOIN tipodocumento AS td ON per.tDoc=td.id 
        LEFT JOIN rol AS r ON per.rol=r.id 
        LEFT JOIN departamentos AS de ON per.id_depa=de.codigoDepartamento 
        LEFT JOIN cuidad AS ci ON per.id_muni=ci.codigoCiudad WHERE rol=2";

        $result = $conexion->prepare($sql);

        $result->execute();
        //$resultado = false;
        while($f=$result->fetch()){
            $resultado[]=$f;
        }
        return $resultado;
    }
    public function reporteinscritos($codigocur){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,t.nombretd,
		d.nombreDepartamento, c.nombreCiudad
        FROM registroconv AS registro
        INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
        INNER JOIN tipodocumento AS t ON p.tDoc=t.id
        INNER JOIN departamentos AS d ON p.id_depa=d.codigoDepartamento
        INNER JOIN ciudad AS c ON p.id_muni=c.codigoCiudad
        WHERE convocatorias=$codigocur;";

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