<?php
    include("conexion.php");
    class ReporteVentas{
        public function reportefechasEventos($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM eventos WHERE fecha BETWEEN '$fechainicio' AND '$fechafin'";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            $resultado = $result -> fetchAll(PDO::FETCH_ASSOC);

            $count = count($resultado);

            $fecha = date("Y-m-d H:i:s");
            header('Content-Type: application/vnd.ms-excel');
			header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
			header('Content-Disposition: attachment; filename="reporte_eventos_'.$fecha.'.csv"');

            $html = "No.;nombre;fecha;descripcion";
            $html .= "\n";

            $j = 1;

            for($i=0; $i < $count ; $i++ ){
                $html.= $j. ";";
                $html.= $resultado[$i]['nombre'].";";
                $html.= $resultado[$i]['fecha'].";";
                $html.= $resultado[$i]['descripcion'].";";
                $html.= "\n";
                $j++;
            }
            
            echo mb_convert_encoding($html, 'UTF-16LE', 'UTF-8');
        }

        public function reportefechasConvocatorias($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT convocatorias.*,tc.tipoCurso,j.nombrejor,per.nombre AS ninstructor,per.apellidos AS ainstructor FROM `convocatorias`
            INNER JOIN tipocurso AS tc ON tCurso=tc.id 
            INNER JOIN jornada AS j ON id_jornada=j.id 
            INNER JOIN person AS per ON  per.nDoc=nDoc_responsable WHERE fecha_fin BETWEEN '$fechainicio' AND '$fechafin'";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            $resultado = $result -> fetchAll(PDO::FETCH_ASSOC);

            $count = count($resultado);

            $fecha = date("Y-m-d H:i:s");
            header('Content-Type: application/vnd.ms-excel');
			header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
			header('Content-Disposition: attachment; filename="reporte_convocatorias_'.$fecha.'.csv"');

            $html = "No.;Nombre;Tipo de Curso;Numero de Ficha;Jornada;Descripcion;Fecha de Inicio;Fecha de Fin;Instructor a Cargo";
            $html .= "\n";

            $j = 1;

            for($i=0; $i < $count ; $i++ ){
                $html.= $j. ";";
                $html.= $resultado[$i]['nombre'].";";
                $html.= $resultado[$i]['tipoCurso'].";";
                $html.= $resultado[$i]['codigo'].";";
                $html.= $resultado[$i]['nombrejor'].";";
                $html.= $resultado[$i]['descripcion'].";";
                $html.= $resultado[$i]['fecha_inicio'].";";
                $html.= $resultado[$i]['fecha_fin'].";";
                $html.= $resultado[$i]['ninstructor']. " " . $resultado[$i]['ainstructor'] .";";
                $html.= "\n";
                $j++;
            }
            
            echo mb_convert_encoding($html, 'UTF-16LE', 'UTF-8');
        }

        public function reportefechasComentarios($fechainicio,$fechafin){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM comentarios WHERE fecha BETWEEN '$fechainicio' AND '$fechafin'";

            
            $result = $conexion->prepare($sql);
            
            $result->execute();
            $resultado = $result -> fetchAll(PDO::FETCH_ASSOC);

            $count = count($resultado);

            $fecha = date("Y-m-d H:i:s");
            header('Content-Type: application/vnd.ms-excel');
			header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
			header('Content-Disposition: attachment; filename="reporte_eventos_'.$fecha.'.csv"');

            $html = "No.;Nombres;Apellidos;Ocupacion;Comentario;Puntuacion;Fecha";
            $html .= "\n";

            $j = 1;

            for($i=0; $i < $count ; $i++ ){
                $html.= $j. ";";
                $html.= $resultado[$i]['nombres'].";";
                $html.= $resultado[$i]['apellidos'].";";
                $html.= $resultado[$i]['ocupacion'].";";
                $html.= $resultado[$i]['comentario'].";";
                $html.= $resultado[$i]['puntuacion'].";";
                $html.= $resultado[$i]['fecha'].";";
                $html.= "\n";
                $j++;
            }
            
            echo mb_convert_encoding($html, 'UTF-16LE', 'UTF-8');
        }



  
        

    }