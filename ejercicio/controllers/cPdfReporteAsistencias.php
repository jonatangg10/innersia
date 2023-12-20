<?php

include '../models/mPdf.php';
ini_set('memory_limit', '4096M');
require_once('../vendor/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

date_default_timezone_set('America/Bogota');
$dia = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$mes = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

$fecha = date("d") . " de " . $mes[date("m")-1] . " de " . date("Y");
$fecha1 = date("Ymd");
$fecha2 = date("d/m/Y");

$anchohoja = 1200;
//$anchohoja = 750;

$prd = new Pdf();
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if(!empty($_GET['reporteinscritos'])){

    $codigocur = $_SESSION['convinfo'][0]['convocatorias'];
    
    $inscritos = $prd->reporteinscritos($codigocur);


}

// $html = "<head>";
//     $html.= "<style type='text/css'>";
//         $html.= "@font-face{";
//             $html .= "font-family: Arial;";
//             $html .= "font-style: normal;";
//             $html .= "font-weight: 100;";
//             //$html .= "src: url(/fonts/arial/.ttf);";
//         $html.= "}";
//         $html.= "html{";
//             $html .= "margin: 0;";
//         $html.= "}";
//         $html.= "img{";
//             $html .= "padding: 3px;";
//         $html.= "}";
//         $html.= "th{";
//             $html .="font-family: 'Arial';";
// 			$html .="font-size: 16px;";
// 			$html .="font-weight: bold;";
// 			$html .="color: #000000;";
// 			$html .="background-color: white;";
//         $html.= "}";
//         $html .="td, strong, td strong {";
//             $html .="font-family: 'Arial';";
//             $html .="font-size: 11px;";
//             $html .="color: #000000;";
//         $html .="}";
//         $html .=".neg {";
//             $html .="font-weight: bold;";
//             $html .="font-family: 'Arial';";
//         $html .="}";
//     $html.= "</style>";
// $html.= "</head>";

$html = "<body>
<div style='text-align: center;'>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <th colspan='4' ><img src='../img/senanara.png' height='80px' width='120px' alt=''><img src='../img/logo_siga.png' height='80px'  width='150px' alt=''></th>
        </tr>
        <tr>
            <td colspan='3' rowspan='3' style='text-align: center;'> PROCESO DE DIRECCIÓN DE FORMACIÓN PROFESIONAL INTEGRAL <br><br><b> FORMATO PLANILLA  DE ASISTENCIA </b></td>
            <td style='text-align: center;width: 9%;'><b>VERSION: 3</b></td>
        </tr>
        <tr>
            <td rowspan='2' style='text-align: center;height:50px ;'><b>CÓDIGO: <br> GFPI-PL-001</b></td>
        </tr> 
    </table>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <td colspan='4' style='text-align: left;'>FECHA DE DILIGENCIAMIENTO (DD/MM/AAAA):</td>
        </tr>
    </table>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <td style='text-align: left; width: 10%;height:50px ;'><b>REGIONAL:</b></td>
            <td style='text-align: center; width: 10%;'>25 Cundinamarca</td>
            <td><b>CENTRO DE FORMACIÓN:</b></td>
            <td style='text-align: center;'>9509 Centro de Desarrollo Agroindustrial y Empresarial</td>
            <td><b>CIUDAD/MUNICIPIO:</b></td>
            <td style='text-align: center; width: 10%;'>VILLETA</td>
        </tr>
    </table>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <td style='text-align: left; width: 60%'>". $_SESSION['convinfo'][0]['tipocurso']." en ". $_SESSION['convinfo'][0]['nombrecur']."</td>
            <td style='text-align: center; height: 50px;'>NÚMERO DE FICHA DE CARACTERIZACIÓN (APLICA PARA PRUEBAS Y MATRICULA)</td>
            <td style='text-align: center; width: 10%;''>". $_SESSION['convinfo'][0]['convocatorias']."</td>
        </tr>
        <tr>
            <td colspan='3' style='text-align: center;'>A CONTINUACIÓN SELECCIONE EL PROCESO QUE SE VA A REALIZAR</td>
        </tr>
    </table>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <td style='text-align: center;'>CHARLAS INFORMATIVAS</td>
            <td><input type='checkbox'></td>
            <td style='text-align: center;'>PRESENTACIÓN PRUEBAS PRESENCIALES</td>
            <td><input type='checkbox'></td>
            <td style='text-align: center;'>MATRICULA</td>
            <td><input type='checkbox'></td>
        </tr>
        <tr>
            <td colspan='6' style='text-align: center;'>DATOS DE LOS  PARTICIPANTES</td>
        </tr>
    </table>
    <table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
        <tr>
            <td>No:</td>
            <td style='text-align: center;width: 20%;height:50px ;'>TIPO DE DOCUMENTO DE IDENTIDAD ASPIRANTE</td>
            <td style='text-align: center;width: 10%;height:50px ;'>NÚMERO DOCUMENTO IDENTIDAD ASPIRANTE</td>
            <td style='text-align: center;width: 30%;height:50px ;'>NOMBRES DEL PARTICIPANTE</td>
            <td style='text-align: center;'>DIRECCIÓN / DEPENDENCIA / CARGO</td>
            <td style='text-align: center;'>CORREO ELECTRONICO</td>
            <td style='text-align: center;'>TELÉFONO</td>
            <td style='text-align: center;width: 10%;height:50px ;'>FIRMA</td>
        </tr>
        <tr> ";
        $i= 1;
                foreach($inscritos AS $p){
                    $html .= "<tr>";
                        $html .= "<td>" .$i ."</td>";
                        $html .= "<td>" .$p['nombretd'] ."</td>";
                        $html .= "<td>" .$p['nDocreg'] ."</td>";
                        $html .= "<td>" .$p['nombre']." ".$p['apellidos'] ."</td>";
                        $html .= "<td>" .$p['nombreDepartamento'].", ".$p['nombreCiudad']."</td>";
                        $html .= "<td>" .$p['correo'] ."</td>";
                        $html .= "<td>" .$p['numerocel'] ."</td>";
                        $html .= "<td></td>";
                    $html .= "</tr>";
                    $i ++;
                };"
        </tr>
    </table>
</div>
</body>";

// $html .="<body>";
// 		$html .="<div align='center' style='float: center;'>";
//             // Primera tabla
// 			$html .= "<table width='".$anchohoja."px' border='1' cellpadding='3px' cellspacing='0'>";
// 				$html .= "<tr>";
// 					$html .= "<th rowspan='2' colspan='5' style='text-align: center;'><img src='../img/convocatorias/Curso_.jpg' width='70' height='77'><img src='../img/convocatorias/Curso_300.jpg' width='70' height='77'></th>";	
// 				$html .= "</tr>";
//                 $html .= "<tr>";
// 					$html .= "<th colspan='4' style='text-align: center;'>HHHH</th>";
//                     $html .= "<th colspan='1' style='text-align: center;'>HHHH</th>";	
// 				$html .= "</tr>";
// 			$html .= "</table>";
//             // Fin Primera tabla

//             $html .= "<br>";
//             $html .= "<br>";

// 		$html .="</div>";
//         // Cuarta Tabla
          
//         $html .="<div align='center' style='float: center;'>";
// 			$html .= "<table width='".$anchohoja."px' border='2' cellpadding='3px' cellspacing='0'>";
// 				$html .= "<tr style='background-color: #1abc9c;'>";
// 					$html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Id";
// 					$html .="</td>";
// 					$html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Nombres";
// 					$html .="</td>";
// 					$html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Apellidos";
// 					$html .="</td>";
// 					$html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Tipo de Documento";
// 					$html .="</td>";
//                     $html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Num Documento";
// 					$html .="</td>";	
// 					$html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Num Celular";
// 					$html .="</td>";
//                     $html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Correo";
// 					$html .="</td>";
//                     $html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Fecha de inscripcion";
// 					$html .="</td>";
//                     $html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Departamento de Residencia";
// 					$html .="</td>";
//                     $html .= "<td style='text-align: center;' class='neg'>";
// 						$html .= "Ciudad de inscripcion";
// 					$html .="</td>";
// 				$html .= "</tr>";
//                 $i= 1;
//                 foreach($productos AS $p){
//                     $html .= "<tr>";
//                         $html .= "<td>" .$i ."</td>";
//                         $html .= "<td>" .$p['nombre'] ."</td>";
//                         $html .= "<td>" .$p['apellidos'] ."</td>";
//                         $html .= "<td>" .$p['nombretd'] ."</td>";
//                         $html .= "<td>" .$p['nDoc'] ."</td>";
//                         $html .= "<td>" .$p['numerocel'] ."</td>";
//                         $html .= "<td>" .$p['correo'] ."</td>";

//                         $html .= "<td>" .$p['fechaper'] ."</td>";
//                         $html .= "<td>" .$p['nombreDepartamento'] ."</td>";
//                         $html .= "<td>" .$p['nombreCiudad'] ."</td>";

//                     $html .= "</tr>";
//                     $i ++;
//                 }
// 			$html .= "</table>";
//         $html.="</div>";
//         // Fin Cuarta Tabla
// $html .="</body>";

echo $html;
echo "<script type='text/javascript'>window.print();</script>";
?>