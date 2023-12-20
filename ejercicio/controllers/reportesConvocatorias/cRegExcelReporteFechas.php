<?php
require '../../vendor/vendor/autoload.php';
require '../../models/mconsultas.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
use PhpOffice\PhpSpreadsheet\Writer\xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;

$consulta = new consultas();
if(isset($_POST['fechainicioreporte'])){
  if(!empty($_POST['fechainicioreporte'])){
    $fechainicioreporte = (isset($_POST['fechainicioreporte']) ? $_POST['fechainicioreporte']:NULL);
    if(!empty($_POST['fechafinreporte'])){
      $fechafinreporte = (isset($_POST['fechafinreporte']) ? $_POST['fechafinreporte']:NULL);

      date_default_timezone_set('America/Bogota');

      $fechainicio = date($fechainicioreporte);
      $fechafin = date($fechafinreporte);
  
      $reporte = $consulta->reportefechasConvocatorias($fechainicio,$fechafin);
  
      if(is_null($reporte)){
        if (session_status() !== PHP_SESSION_ACTIVE) {
          // Si no está iniciada, la iniciamos
          session_start();
        }
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="No hay convocatorias entre estas fechas";
        echo "<script>location.href='../../views/reportesConvocatorias.php'</script>";
      }

    }else{
      if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
      }
      $_SESSION['tipo_alert']="danger";
      $_SESSION['mensaje']="Seleccione una fecha final";
      echo "<script>location.href='../../views/reportesConvocatorias.php'</script>";
    }
  }else{
    if (session_status() !== PHP_SESSION_ACTIVE) {
      // Si no está iniciada, la iniciamos
      session_start();
    }
    $_SESSION['tipo_alert']="danger";
    $_SESSION['mensaje']="Seleccione una fecha inicial";
    echo "<script>location.href='../../views/reportesConvocatorias.php'</script>";
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
->setTitle('Reporte convocatorias por fechas')
->setSubject('Reporte')
->setDescription('Reporte'. $fecha)
->setKeywords('PHPSpreadsheet')
->setCategory('Excel');

$spread->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$spread->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$spread->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('I')->setWidth(35);


$spread->getActiveSheet()->mergeCells('A1:H2');

$spread
    ->getActiveSheet()
    ->getStyle('A1:I2')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);

$spread->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true);

$spread->getActiveSheet()->mergeCells('H3:I3');




$spread
    ->getActiveSheet()
    ->getStyle('A3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');



$spread
    ->getActiveSheet()
    ->getStyle('C3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');

$spread
    ->getActiveSheet()
    ->getStyle('E3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');

$spread
    ->getActiveSheet()
    ->getStyle('G3')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('f5e1c8');







$spread->getActiveSheet()->getStyle('A4:I4')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A4:I4')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A4:I4')->getFont()->setBold(true);



$spread
    ->getActiveSheet()
    ->getStyle('A4:I4')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('A1:I2')
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
   ->getStyle('B3')
   ->getBorders()
   ->getOutline()
   ->setBorderStyle(Border::BORDER_THIN)
   ->setColor(new Color('000000'));

$spread
   ->getActiveSheet()
   ->getStyle('C3')
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
  ->getStyle('E3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));

$spread
  ->getActiveSheet()
  ->getStyle('F3')
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
  ->getStyle('H3:I3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));







// Texto

$hoja = $spread->getActiveSheet();
$hoja->setTitle("Reporte");

$hoja->setCellValue("A1", "Reporte convocatorias por fechas");

$hoja->setCellValue("A3", "Fecha incio:");
$hoja->setCellValue("B3", $fechainicio);
$hoja->setCellValue("C3", "Fecha fin:");
$hoja->setCellValue("D3", $fechafin);
$hoja->setCellValue("E3", 'Fecha realizado:');
$hoja->setCellValue("F3", $fecha);

$hoja->setCellValue("G3", "Reporte realizado por:");
$hoja->setCellValue("H3", $_SESSION['nombre'] . ' ' . $_SESSION['apellidos']);


$hoja->setCellValue("A4", "N°");
$hoja->setCellValue("B4", "Nombre");
$hoja->setCellValue("C4", "Tipo de curso");
$hoja->setCellValue("D4", "Numero de ficha");
$hoja->setCellValue("E4", "Jornada");
$hoja->setCellValue("F4", "Instructor responsable");
$hoja->setCellValue("G4", "Fecha inicio");
$hoja->setCellValue("H4", "Fecha fin");
$hoja->setCellValue("I4", "Descripcion");


// Bordes para el foreach

$count = count($reporte);
$bordes = $count + 4;
$spread
     ->getActiveSheet()
    ->getStyle('A4:I'.$bordes)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));
    
// Foreach

$n = 5;
$i = 1;

foreach($reporte as $r){
    
    // $spread->getActiveSheet()->mergeCells('D'.$n.':H'.$n);
    // $spread->getActiveSheet()->getRowDimension($n)->setRowHeight(40);
    // $spread->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getAlignment()->setWrapText(true);
    $spread->getActiveSheet()->getStyle('A'.$n.':I'.$n)->getAlignment()->setHorizontal('center');
    $spread->getActiveSheet()->getStyle('A'.$n.':I'.$n)->getAlignment()->setVertical('center');
    $hoja->setCellValue('A'.$n,$i);
    $hoja->setCellValue('B'.$n,$r['nombre']);
    $hoja->setCellValue('C'.$n,$r['tipoCurso']);
    $hoja->setCellValue('D'.$n,$r['codigo']);
    $hoja->setCellValue('E'.$n,$r['nombrejor']);
    $hoja->setCellValue('F'.$n,$r['nomins'] . ' '. $r['apeins']);
    $hoja->setCellValue('G'.$n,$r['fecha_inicio']);
    $hoja->setCellValue('H'.$n,$r['fecha_fin']);
    $hoja->setCellValue('I'.$n,$r['descripcion']);
    $n++;
    $i++;
}



$fileName="ReporteFechasConvocatorias" . $fecha . ".xlsx";
# Crear un "escritor"
$writer = new xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');


?>