<?php
    include("conexion.php");
    class Consultas{
        public function estrutura($Nombre,$tCompetencia,$nResulA,$tHoras,$ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            $sql ="INSERT INTO estructuracurri (`nombreEs`, `tCompetencia`, `nResultados`, `totalHoras`, `ficha`)
            VALUES ('$Nombre', $tCompetencia, $nResulA, $tHoras, $ficha)";
            $result = $conexion->prepare($sql);

            $result->execute();
            // $resultado = false;
          
            return $result;
        }
        public function estructuramas($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT estructuracurri.*,tc.TEnombre fROM  estructuracurri
            INNER JOIN tipoestructura AS tc ON tCompetencia=tc.id
            WHERE ficha=$ficha  ORDER BY estructuracurri.tCompetencia ASC";

            // SELECT convocatorias.*,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias`
            // INNER JOIN tipocurso AS tc ON tCurso=tc.id 
            // INNER JOIN jornada AS j ON id_jornada=j.id 
            // INNER JOIN person AS per ON  per.nDoc=nDoc_responsable
            $result = $conexion->prepare($sql);

            $result->execute();
            $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;

        }
        public function eliminar($id){

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
        
            $sql = "DELETE FROM estructuracurri WHERE id=$id";
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result;

        }
        public function editar($ids){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            // $sql = "SELECT * FROM registroconv WHERE id=$idUsucon";
            $sql = "SELECT * FROM estructuracurri WHERE id=$ids";

            $result = $conexion->prepare($sql);
           

            $result->execute();
            // $resultado = false;
            while($f=$result->fetch()){
                $resultado[]=$f;
            }
            return $resultado;
            
        }

        public function editarEstructura($enombre,$tCom,$rApre,$hTotal,$idEstructura){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql="UPDATE estructuracurri SET nombreEs='$enombre',tCompetencia=$tCom,nResultados=$rApre,totalHoras=$hTotal WHERE id=$idEstructura;";
            $result = $conexion->prepare($sql);
            $result->execute();
            $resultado = true;

            return $resultado;

          }
          
    }
?>