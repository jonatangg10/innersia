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
  
      $reporte = $consulta->reportefechasEventos($fechainicio,$fechafin);
  
      if(is_null($reporte)){
        if (session_status() !== PHP_SESSION_ACTIVE) {
          // Si no está iniciada, la iniciamos
          session_start();
        }
        $_SESSION['tipo_alert']="danger";
        $_SESSION['mensaje']="No hay eventos entre estas fechas";
        echo "<script>location.href='../../views/reportesEventos.php'</script>";
      }

    }else{
      if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
      }
      $_SESSION['tipo_alert']="danger";
      $_SESSION['mensaje']="Seleccione una fecha final";
      echo "<script>location.href='../../views/reportesEventos.php'</script>";
    }
  }else{
    if (session_status() !== PHP_SESSION_ACTIVE) {
      // Si no está iniciada, la iniciamos
      session_start();
    }
    $_SESSION['tipo_alert']="danger";
    $_SESSION['mensaje']="Seleccione una fecha inicial";
    echo "<script>location.href='../../views/reportesEventos.php'</script>";
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
->setTitle('Reporte eventos por fechas')
->setSubject('Reporte')
->setDescription('Reporte'. $fecha)
->setKeywords('PHPSpreadsheet')
->setCategory('Excel');

$spread->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spread->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$spread->getActiveSheet()->getColumnDimension('E')->setWidth(18);
$spread->getActiveSheet()->getColumnDimension('F')->setWidth(25);
$spread->getActiveSheet()->getColumnDimension('G')->setWidth(25);
$spread->getActiveSheet()->getColumnDimension('H')->setWidth(35);


$spread->getActiveSheet()->mergeCells('A1:H2');

$spread
    ->getActiveSheet()
    ->getStyle('A1:H2')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);

$spread->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A3:H3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold(true);

$spread->getActiveSheet()->mergeCells('D4:H4');




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





$spread->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A4:H4')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A4:H4')->getFont()->setBold(true);



$spread
    ->getActiveSheet()
    ->getStyle('A4:H4')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('A1:H2')
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
  ->getStyle('H3')
  ->getBorders()
  ->getOutline()
  ->setBorderStyle(Border::BORDER_THIN)
  ->setColor(new Color('000000'));







// Texto

$hoja = $spread->getActiveSheet();
$hoja->setTitle("Reporte");

$hoja->setCellValue("A1", "Reporte eventos por fechas");

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
$hoja->setCellValue("C4", "Fecha");
$hoja->setCellValue("D4", "Descripción");


// Bordes para el foreach

$count = count($reporte);
$bordes = $count + 4;
$spread
     ->getActiveSheet()
    ->getStyle('A4:H'.$bordes)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));
    
// Foreach

$n = 5;
$i = 1;

foreach($reporte as $r){
    
    $spread->getActiveSheet()->mergeCells('D'.$n.':H'.$n);
    // $spread->getActiveSheet()->getRowDimension($n)->setRowHeight(40);
    // $spread->getActiveSheet()->getStyle('D'.$n.':H'.$n)->getAlignment()->setWrapText(true);
    $spread->getActiveSheet()->getStyle('A'.$n.':H'.$n)->getAlignment()->setHorizontal('center');
    $spread->getActiveSheet()->getStyle('A'.$n.':H'.$n)->getAlignment()->setVertical('center');
    $hoja->setCellValue('A'.$n,$i);
    $hoja->setCellValue('B'.$n,$r['nombre']);
    $hoja->setCellValue('C'.$n,$r['fecha']);
    $hoja->setCellValue('D'.$n,$r['descripcion']);
    $n++;
    $i++;
}



$fileName="ReporteFechasEventos" . $fecha . ".xlsx";
# Crear un "escritor"
$writer = new xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');


?>