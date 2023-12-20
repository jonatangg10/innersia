<?php
    include("conexion.php");
    class ReporteVentas{
        public function reportefechasAprendices($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
            c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion,tipodoc.nombretd, vulnerable.nombrepob, p.tDoc
            FROM registroconv AS registro
            INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
            INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
            INNER JOIN tipocurso AS tipo ON tipo.id=c.tCurso
            INNER JOIN tipodocumento AS tipodoc ON tipodoc.id=p.tDoc
            INNER JOIN poblacion AS vulnerable ON vulnerable.id=p.tpoblacion
            WHERE convocatorias=$ficha;";
         
            $result = $conexion->prepare($sql);
            
            $result->execute();
            $resultado = $result -> fetchAll(PDO::FETCH_ASSOC);

            $count = count($resultado);

            $fecha = date("Y-m-d H:i:s");
            header('Content-Type: application/vnd.ms-excel');
			header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
			header('Content-Disposition: attachment; filename="reporte_eventos_'.$fecha.'.csv"');
            $roless = array(
                1  => "T.I",
                2  => "C.C",
                3  => "P.A",
                4  => "R.C"
            );
            

            $html = "Resultado del Registro (Reservado para el sistema);         Tipo de Documento;    Numero de Documento;   Codigo de Ficha   ;Tipo Poblacion Aspirante;    Tipo de Organizacion;    Codigo Empresa (solo si la ficha es cerrada)";
            $html .= "\n";

            for($i=0; $i < $count ; $i++ ){
                $html.= " ". ";";
                $html.= "".$roless[$resultado[$i]['tDoc']]. ";";
                $html.= "".$resultado[$i]['nDocreg']. ";";
                $html.= "".$resultado[$i]['convocatorias']. ";";
                $html.= "".$resultado[$i]['nombrepob']. ";";
                $html.= " ". ";";
                $html.= " ". ";";
                $html.= "\n";
                
            }
            
            echo mb_convert_encoding($html, 'UTF-16LE', 'UTF-8');
            
        }
        public function reportepoblacionaprendices($ficha){
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $sql = "SELECT registro.*,p.tDoc, p.nombre, p.apellidos,p.numerocel,p.correo,p.fechanacimiento,p.id_depa,p.id_muni,p.documentoPdf,p.registraduriaDocu,c.fecha_fin,
            c.nombre as nombrecur, tipo.tipocurso,p.tpoblacion,tipodoc.nombretd, vulnerable.nombrepob, p.tDoc
            FROM registroconv AS registro
            INNER JOIN person AS p ON p.Ndoc=registro.nDocReg
            INNER JOIN convocatorias AS c ON c.codigo=registro.convocatorias
            INNER JOIN tipocurso AS tipo ON tipo.id=c.tCurso
            INNER JOIN tipodocumento AS tipodoc ON tipodoc.id=p.tDoc
            INNER JOIN poblacion AS vulnerable ON vulnerable.id=p.tpoblacion
            WHERE convocatorias=$ficha;";

            $sql2 = "SELECT * FROM poblacion;";

            
            $result = $conexion->prepare($sql);
            $result2 = $conexion->prepare($sql2);
            
            $result->execute();
            $result2->execute();

            $resultado = $result -> fetchAll(PDO::FETCH_ASSOC);
            $resultado2 = $result2 -> fetchAll(PDO::FETCH_ASSOC);

            $count = count($resultado);
            $count2 = count($resultado2);

            $fecha = date("Y-m-d H:i:s");
			header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
			header('Content-Disposition: attachment; filename="reporte_eventos_'.$fecha.'.xls"');
            $roless = array(
                1  => "T.I",
                2  => "C.C",
                3  => "P.A",
                4  => "R.C"
            );
            
            $html = "
            <meta charset='UTF-8'>
            <div style='float:left;'>
            <table border='1'>
            <caption style='background-color:red;'>FORMATO PARA LA INSCRIPCIÓN DE ASPIRANTES EN SOFIA PLUS v1.0</caption>
            <tr>
            <th>Resultado del Registro
            (Reservado para el sistema)</th>
            <th>Tipo de Identificación</th>
            <th>Numero de Identificación</th>
            <th>Código de la ficha</th>
            <th>Tipo poblacion Aspirante</th>
            <th>Tipo de Organizaciòn</th>
            <th>Codigo Empresa
            (Solo si la ficha es cerrada)</th>
            </tr>";
            for($i=0; $i < $count ; $i++ ){
                $html.= "<tr>";
                $html.= "<td>".''. "</td>";
                $html.= "<td>".$roless[$resultado[$i]['tDoc']]. "</td>";
                $html.= "<td>".$resultado[$i]['nDocreg']. "</td>";
                $html.= "<td>".$resultado[$i]['convocatorias']. "</td>";
                $html.= "<td>".$resultado[$i]['nombrepob']. "</td>";
                $html.= "<td>".''. "</td>";
                $html.= "<td>".''. "</td>";
                $html.= "</tr>";
                
            }

            $html .= "</table></div><br>";
            // $html .= "
            // <div style='float:right;'>
            // <table style='po' border='1'>
            // <tr><th>tipo de poblacion</th></tr>";
            // for($j=0; $j < $count2; $j++){
            //     $html .= "<tr>";
            //     $html .= "<td>".$resultado2[$j]['nombrepob']. "</td>";
            //     $html .= "</tr>";
            // }

            // $html .= "</table></div>";


            
            echo $html;
        }

    }