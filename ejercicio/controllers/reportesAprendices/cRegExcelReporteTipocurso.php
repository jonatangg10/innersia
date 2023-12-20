<?php
require '../../vendor/vendor/autoload.php';
require '../../models/mconsultas.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
use PhpOffice\PhpSpreadsheet\Writer\xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;

$consulta = new consultas();
if(isset($_POST['tipoDeCurso'])){
  if(!empty($_POST['tipoDeCurso'])){
    if(is_numeric($_POST['tipoDeCurso'])){
      $tipoDeCurso = (isset($_POST['tipoDeCurso']) ? $_POST['tipoDeCurso']:NULL);

      $reporte = $consulta->reportetipoDeCurso($tipoDeCurso);

      if(is_null($reporte)){
        if (session_status() !== PHP_SESSION_ACTIVE) {
          // Si no está iniciada, la iniciamos
          session_start();
        }
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="No hay usuarios registrados en el tipo de curso";
        echo "<script>location.href='../../views/reportesAprendices.php'</script>";
      }

    }else{
      if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
      }
      $_SESSION['tipo_alert']="danger";
      $_SESSION['mensaje']="Error";
      echo "<script>location.href='../../views/reportesAprendices.php'</script>";
    }
  }else{
    if (session_status() !== PHP_SESSION_ACTIVE) {
      // Si no está iniciada, la iniciamos
      session_start();
    }
    $_SESSION['tipo_alert']="danger";
    $_SESSION['mensaje']="Seleccione una opción";
    echo "<script>location.href='../../views/reportesAprendices.php'</script>";
  }

}
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}

date_default_timezone_set('America/Bogota');
$fecha = date('d-m-Y h:i:s');

$spread = new Spreadsheet();
$spread
->getProperties()
->setCreator("Innersia")
->setLastModifiedBy("Innersia")
->setTitle('Reporte Aprendices inscritos por tipo de curso')
->setSubject('Reporte')
->setDescription('Reporte'. $fecha)
->setKeywords('PHPSpreadsheet')
->setCategory('Excel');

$spread->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('k')->setAutoSize(true);
$spread->getActiveSheet()->mergeCells('A1:k2');

$spread
    ->getActiveSheet()
    ->getStyle('A1:k2')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);

$spread->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A3:K3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A3:K3')->getFont()->setBold(true);

$spread
    ->getActiveSheet()
    ->getStyle('A3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');

$spread->getActiveSheet()->mergeCells('A3:C3');

$spread
    ->getActiveSheet()
    ->getStyle('G3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');

$spread
    ->getActiveSheet()
    ->getStyle('I3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');


$spread->getActiveSheet()->mergeCells('D3:F3');


$spread->getActiveSheet()->mergeCells('J3:K3');

$spread->getActiveSheet()->getStyle('A4:k4')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A4:k4')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A4:k4')->getFont()->setBold(true);

$spread
    ->getActiveSheet()
    ->getStyle('A4:k4')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('A1:k2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread
   ->getActiveSheet()
   ->getStyle('A3')
   ->getBorders()
   ->getOutline()
   ->setBorderStyle(Border::BORDER_THIN)
   ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('B3:C3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('D3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('E3:F3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('G3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('H3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('I3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('J3:K3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));



// Texto

$hoja = $spread->getActiveSheet();
$hoja->setTitle("Reporte");

$hoja->setCellValue("A1", "Reporte Aprendices por tipo de curso");

$hoja->setCellValue("A3", "Tipo de curso:");
$hoja->setCellValue("D3", $reporte[0]['tipoCurso']);
$hoja->setCellValue("G3", 'Fecha realizado:');
$hoja->setCellValue("H3", $fecha);

$hoja->setCellValue("I3", "Reporte realizado por:");
$hoja->setCellValue("J3", $_SESSION['nombre'] . ' ' . $_SESSION['apellidos']);


$hoja->setCellValue("A4", "N°");
$hoja->setCellValue("B4", "Nombres");
$hoja->setCellValue("C4", "Apellidos");
$hoja->setCellValue("D4", "Tipo de documento");
$hoja->setCellValue("E4", "Numero de documento");
$hoja->setCellValue("F4", "Genero");
$hoja->setCellValue("G4", "Numero de celular");
$hoja->setCellValue("H4", "Correo electronico");
$hoja->setCellValue("I4", "Tipo de poblacion");
$hoja->setCellValue("J4", "Departamento de residencia");
$hoja->setCellValue("K4", "Ciudad de residencia");

// Bordes para el foreach

$count = count($reporte);
$bordes = $count + 4;
$spread
     ->getActiveSheet()
    ->getStyle('A4:K'.$bordes)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));
    
// Foreach

$n = 5;
$i = 1;

foreach($reporte as $r){
    $spread->getActiveSheet()->getStyle('A'.$n.':k'.$n)->getAlignment()->setHorizontal('center');
    $spread->getActiveSheet()->getStyle('A'.$n.':k'.$n)->getAlignment()->setVertical('center');
    $hoja->setCellValue('A'.$n,$i);
    $hoja->setCellValue('B'.$n,$r['nombre']);
    $hoja->setCellValue('C'.$n,$r['apellidos']);
    $hoja->setCellValue('D'.$n,$r['nombretd']);
    $hoja->setCellValue('E'.$n,$r['nDocreg']);
    $hoja->setCellValue('F'.$n,$r['nombregen']);
    $hoja->setCellValue('G'.$n,$r['numerocel']);
    $hoja->setCellValue('H'.$n,$r['correo']);
    $hoja->setCellValue('I'.$n,$r['nombrepob']);
    $hoja->setCellValue('J'.$n,$r['nombreDepartamento']);
    $hoja->setCellValue('K'.$n,$r['nombreCiudad']);
    $n++;
    $i++;
}



$fileName="ReporteTipoCurso". $reporte[0]['tipoCurso']. "-". $fecha. ".xlsx";
# Crear un "escritor"
$writer = new xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');


?>