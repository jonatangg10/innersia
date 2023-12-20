<?php
$documentos = array(
    1  => "T.I",
    2  => "C.C",
    3  => "P.A",
    4  => "R.C"
);

date_default_timezone_set('America/Bogota');

$fecha_actual = getdate();
// echo "Día: " . $fecha_actual['mday'] . "<br>";
// echo "Mes: " . $fecha_actual['mon'] . "<br>";
// echo "Año: " . $fecha_actual['year'] . "<br>";
// echo "Hora: " . $fecha_actual['hours'] . ":" . $fecha_actual['minutes'] . ":" . $fecha_actual['seconds'];

include '../models/mActa.php';
ini_set('memory_limit', '4096M');
require_once('../vendor/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

date_default_timezone_set('America/Bogota');
$dia = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fecha = date("d") . " de " . $mes[date("m")-1] . " de " . date("Y");
$fecha1 = date("Ymd");
$fecha2 = date("d/m/Y");

//$anchohoja = 1200;
$anchohoja = 750;


$prd = new Pdf();

if(!empty($_GET['reporteinscritos'])){
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }

    $nDoc = $_SESSION['documento'];
    
    $inscritos = $prd->Acta($nDoc);


}

$html = "<body>
<div>
<table style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <tr>
        <th style='opacity: 0.5; text-align: left; width: 20%;'><img src='../img/senanara.png' height='60px' width='60px'><img src='../img/logo_siga.png' height='60px' width='60px' alt=''></th>
        <th style='text-align: center; opacity: 0.5;'>PROCESO DE DIRECCIÓN DE FORMACIÓN PROFESIONAL INTEGRAL <br><b>FORMATO 'MI COMPROMISO DE APRENDIZ SENA'</th>
    </tr>
</table>

<table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <tr>
        <td colspan='8' style='text-align:left;'><p style='margin-left: 10px;'><b>Yo,</b>". " " . $_SESSION['nombre'] . " ". $_SESSION['apellidos'] ." </p></td>
    </tr>
    <tr>
        <td rowspan='1' style='text-align: left;'><b>Con documento de identidad:</b><br>(marcar con una X)</td>
        <th colspan='1' style='text-align: left; width: 10%;height:50px ;' >Tarjeta de Identidad</th>
        <th colspan='1' style='text-align: left; width: 2%;height:10px ;'></th>
        <th colspan='1' style='text-align: left; width: 10%;height:50px ;'>Cédula de Ciudadanía</th>
        <th colspan='1' style='text-align: left; width: 2%;height:10px ;'></th>
        <th colspan='1' style='text-align: left; width: 2%;height:10px ;'>Cédula de Extranjería</th>
        <th colspan='1' style='text-align: left; width: 2%;height:10px ;'></th>
        <br>
        <td rowspan='2' style='text-align: center; width: 10%;height:50px ;'><b>No.". $_SESSION['documento'] ."</b></td>
    </tr>
    <tr>
        <td style='text-align: left; width: 10%;height:50px ;'>Otro</td>
        <th colspan='1' style='text-align: left; width: 2%;height:10px ;'></th>
        <td colspan='1' style='text-align: left; width: 2%;height:10px ;'>Cual</td>
        <th colspan='4' style='text-align: left; width: 2%;height:10px ;'></th>
    </tr>
    <tr>
        <td colspan='9' style='text-align: left; width: 10%;height:30px'><p style='margin-left: 10px;'><b>Matriculado en el programa de formación: </b>". $inscritos[0]['nDoc'] ."</p></td>
    </tr>
</table>
<table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <tr>
        <td rowspan='2' style='text-align: left; width: 8%;height:50px'><p style='margin-left: 10px;'><b>Ficha de Caracterización No.</b></p></td>
        <th colspan='2' style='text-align: left; width: 10%;height:10px ;'></th>
        <td style='text-align: left;border: inset 0pt; width: 30%;height:10px ;'><p style='margin-left: 10px;'><b>Del Centro de Formación: </b>Centro de Desarrollo Agroindustrial y Empresarial</p></td>
    </tr>
</table>
<table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <td rowspan='1' style='text-align: left; width: 10%;height:50px;font-size: 15px;'><p style='margin-left: 10px;margin-right: 10px;'>Me comprometo con el Servicio Nacional de
    Aprendizaje - SENA, en mi calidad de Aprendiz, y como persona responsable de
    mis actos, a: <br><br>
            
    <b>1.</b> Cumplir y promover las disposiciones contempladas en el Reglamento del Aprendiz SENA, publicado en la página
    web del Sena y en el blog de cada centro de formación, del cual hago constar que he leído y entendido, por lo que acepto
    las responsabilidades, derechos y obligaciones establecidas; así como acatar las Normas y los Acuerdos de
    Convivencia Institucional de conformidad con el contexto geográfico y social del Centro de Formación. <br>
    <b>2.</b> Participar en todo el proceso de inducción para iniciar el programa de formación, de acuerdo con la
    programación del Centro de Formación. <br>
    <b>3.</b> Portar en todo momento el carné de identificación institucional en sitio visible.<br>
    <b>4.</b> Proyectar la imagen corporativa del Sena dentro y fuera de la Entidad asumiendo una actitud ética, con
    principios y valores sociales en cada una de mis actuaciones. <br>
    <b>5.</b> Respetar la orientación sexual, identidad de género, edad, etnia, culto, religión, ideología, procedencia y
    ocupación, de todos los integrantes de la comunidad educativa. <br>
    <b>6.</b> Al finalizar la formación dar cumplimiento oportuno a todos los trámites académicos y administrativos para
    lograr la certificación dentro del término que establece el reglamento. <br>
    <b>7.</b> Si soy seleccionado como beneficiario para recibir apoyo de sostenimiento, alimentación, transporte u otro,
    por parte de la entidad, me comprometo a realizar de forma adecuada todo los trámites administrativos y académicos
    correspondientes reglamentados por el Sena. <br>
    <b>8.</b> Registrar y mantener actualizados mis datos personales y de contacto en los aplicativos informáticos que el
    Senadetermine y actuar como veedor del registro oportuno de las situaciones académicas y administrativas que se
    presenten. Cualquier dato registrado por el aprendiz que no corresponda con la información real, será sujeto a lo
    establecido en la ley de delitos informáticos y demás normatividad vigente sobre uso de plataformas públicas. <br>
    <b>9.</b> Con la firma del presente compromiso autorizo al Sena para que me notifique a través de mi correo electrónico
    registrado en el aplicativo Sofia plus, todos los actos académicos y administrativos, así como también los
    procedimientos y trámites en general que profiera, de acuerdo con las políticas de uso y confidencialidad. <br></p>
</td>
</table>
<table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <tr>
    <td style='text-align: left; width: 10%;height:50px'><p style='margin-left: 10px;'><b>FIRMA DEL APRENDIZ:</b></p></td>
    <td style='text-align: left; width: 10%;height:50px'><p style='margin-left: 10px;'><b>No. Documento de Identidad: </b>" .$_SESSION['documento']. "</p></td>
    </tr>
    <tr>
    <td rowspan='3' style='text-align: left; width: 18%;height:50px'><b>FIRMA DE: LA MADRE, EL PADRE O TUTOR (A) </b></p><br>
        (Únicamente en caso de que el (la) aprendiz sea menor de edad, debe anexar copia del documento oficial que
        acredite la condición de padre, madre o tutor (a) para cotejar)<br><br><br>
    </td>
    <td rowspan='3'><b>Tipo y No. Documento de Identidad:</b><br><br>". $documentos[$_SESSION['tDoc']] . " ".$_SESSION['documento']."</td>
    </tr>
</table>
<table border='1' style='margin: auto;width: ". $anchohoja .";border-collapse: collapse;'>
    <tr>
        <td style='text-align: left; width: 20%;height:20px'><p style='margin-left: 10px;'><b>FECHA DE DILIGENCIAMIENTO:</b></p></td>
        <td style='text-align: left; width: 10%;height:20px'><p style='margin-left: 10px;'><b>DIA: </b>" . $fecha_actual['mday'] . "</p></td>
        <td style='text-align: left; width: 10%;height:20px'><p style='margin-left: 10px;'><b>MES: </b>" . $mes[date("m")-1] . "</p></td>
        <td style='text-align: left; width: 10%;height:20px'><p style='margin-left: 10px;'><b>AÑO: </b>" . $fecha_actual['year'] . "</p></td>
    </tr>
</table>
<table  style='margin: auto;width: ". $anchohoja .";'>
    <tr>
        <td style='text-align: center;font-style: italic;font-size: 12px;'><b>Este documento forma parte de la ficha académica del aprendiz y es prueba del compromiso que adquiere con el SENA de cumplir el<br>Reglamento de Aprendices SENA, el cual es firmado durante el proceso de matrícula en un programa de formación en el SENA.</b></td>
    </tr>
</table>
</div>
</body>";

echo $html;
echo "<script type='text/javascript'>window.print();</script>";
?>