<?php
require '../vendor/vendor/autoload.php';
require '../models/mconsultas.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
use PhpOffice\PhpSpreadsheet\Writer\xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;

$consulta = new consultas();
if(!empty($_GET['EstructuraCurricularExcel'])){
        
    $ficha = $_GET['EstructuraCurricularExcel'];

    $estructura =  $consulta->estructuraexcel($ficha);
}


$spread = new Spreadsheet();
$spread
->getProperties()
->setCreator("Innersia")
->setLastModifiedBy($estructura[0]['nDoc_responsable'])
->setTitle('Excel creado con PhpSpreadSheet')
->setSubject('Ficha: ' . $estructura[0]['ficha'])
->setDescription('Diagrama de Gang - Estructura Curricular')
->setKeywords('PHPSpreadsheet')
->setCategory('Excel');

// $spread
//     ->getActiveSheet()
//     ->getStyle('A5:B5')
//     ->getFill()
//     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
//     ->getStartColor()
//     ->setARGB('FF0000');

// $spread
//     ->getActiveSheet()
//     ->getStyle('A5:A7')
//     ->getFill()
//     ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
//     ->getStartColor()
//     ->setARGB('FF0000');

// Estilos curricular
$spread->getActiveSheet()->mergeCells('A1:B2');
$spread->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
$spread->getActiveSheet()->getColumnDimension('B')->setWidth(57);
$spread->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$spread->getActiveSheet()->getStyle('A1')->getFont()->setName('Calibri');

$spread
    ->getActiveSheet()
    ->getStyle('A1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');
$spread
    ->getActiveSheet()
    ->getStyle('A1:B2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread
    ->getActiveSheet()
    ->getStyle('A4:J4')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('FCB773');

$spread->getActiveSheet()->mergeCells('C1:C2');
$spread->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$spread->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('C1')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('C1')->getFont()->setName('Calibri');
$spread
    ->getActiveSheet()
    ->getStyle('C1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('C1:C2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->mergeCells('D1:D2');
$spread->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$spread->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('D1')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('D1')->getFont()->setName('Calibri');
$spread
    ->getActiveSheet()
    ->getStyle('D1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('D1:D2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$spread->getActiveSheet()->getColumnDimension('F')->setWidth(12);
$spread->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$spread->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$spread->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$spread->getActiveSheet()->getColumnDimension('J')->setWidth(15);


$spread->getActiveSheet()->mergeCells('E1:H2');
$spread->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('E1')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('E1')->getFont()->setName('Calibri');

$spread
    ->getActiveSheet()
    ->getStyle('E1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread
    ->getActiveSheet()
    ->getStyle('E1:H2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->mergeCells('I1:I2');
$spread
    ->getActiveSheet()
    ->getStyle('I1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');

$spread->getActiveSheet()->mergeCells('J1:J2');
$spread->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('J1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('J1')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('J1')->getFont()->setName('Calibri');

$spread
    ->getActiveSheet()
    ->getStyle('J1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('90ee90');

$spread
    ->getActiveSheet()
    ->getStyle('I1:J2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getRowDimension('3')->setRowHeight(35);
$spread->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('A3')->getFont()->setName('Calibri');

$spread
    ->getActiveSheet()
    ->getStyle('A3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('B3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('B3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('B3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('C3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('C3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('C3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('D3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('D3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('D3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('D3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('D3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('E3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('E3')->getAlignment()->setWrapText(true);
$spread->getActiveSheet()->getStyle('E3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('E3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('E3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('F3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('F3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('F3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('F3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('F3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('G3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('G3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('G3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('G3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('H3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('H3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('H3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('H3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('H3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('I3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('I3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('I3')->getAlignment()->setWrapText(true);
$spread->getActiveSheet()->getStyle('I3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('I3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('I3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('J3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('J3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('J3')->getAlignment()->setWrapText(true);
$spread->getActiveSheet()->getStyle('J3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('J3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('J3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));



// tablas de horarios
$spread->getActiveSheet()->mergeCells('L1:P2');
$spread->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('L1')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
$spread->getActiveSheet()->getStyle('L1')->getFont()->setSize(12);
$spread->getActiveSheet()->getStyle('L1')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('L1:P2')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));
    

$spread->getActiveSheet()->getStyle('L3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('L3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('L3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('L3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('L3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('M3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('M3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('M3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('M3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('M3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('N3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('N3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('N3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('N3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('N3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('O3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('O3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('O3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('O3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('O3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('P3')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('P3')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('P3')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('P3')->getFont()->setName('Calibri');

$spread
     ->getActiveSheet()
    ->getStyle('P3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));


$spread->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A4')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('A4')->getFont()->setName('Calibri');

$spread->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('B4')->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('B4')->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('B4')->getFont()->setName('Calibri');

$count = count($estructura);
$bordes = $count + 4;
$spread
     ->getActiveSheet()
    ->getStyle('A4:J'.$bordes + 1)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread
    ->getActiveSheet()
    ->getStyle('L4:P'.$bordes)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN)
    ->setColor(new Color('000000'));

$spread->getActiveSheet()->getStyle('A4:J'.$bordes + 1)->getAlignment()->setHorizontal('center');
$spread->getActiveSheet()->getStyle('A4:J'.$bordes + 1)->getAlignment()->setVertical('center');
$spread->getActiveSheet()->getStyle('A4:J'.$bordes + 1)->getFont()->setSize(8);
$spread->getActiveSheet()->getStyle('A4:J'.$bordes + 1)->getFont()->setName('Calibri');

$spread
    ->getActiveSheet()
    ->getStyle('A'.($bordes + 2).':J'.($bordes+2))
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('c7c8CA');


$spread
    ->getActiveSheet()
    ->getStyle('A'.$bordes + 1 . ':J'.$bordes + 1)
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('FCB773');






// texto curricular
$hoja = $spread->getActiveSheet();
$hoja->setTitle("ADSO 2502959");
// $hoja->setCellValueByColumnAndRow(1, 1, "Un valor en 1, 1");
// $hoja->setCellValue("B2", "Este va en B2");
// $hoja->setCellValue("A3", "Parzibyte");

// $hoja->setCellValue("A10", 4);
// $hoja->setCellValue("A11", 4);

$hoja->setCellValue("A1", $estructura[0]['nomcur'] . " - " . $estructura[0]['ficha'] . " - ". " Jornada ". $estructura[0]['nombrejor']);
$hoja->setCellValue("C1", "SOFIA");
$hoja->setCellValue("D1", $estructura[0]['tipoCurso']);
$hoja->setCellValue("E1", $estructura[0]['nomins']. " " . $estructura[0]['apeins']);
$hoja->setCellValue("J1", $estructura[0]['tCurso'] == 2 ? 21 : 9);

$hoja->setCellValue("A3", "R.A");
$hoja->setCellValue("B3", "%");
$hoja->setCellValue("C3", "TOTAL HORAS");
$hoja->setCellValue("D3", "DIAS");
$hoja->setCellValue("E3", "HORAS FORMACION");
$hoja->setCellValue("F3", "INICIA");
$hoja->setCellValue("G3", "TERMINA");
$hoja->setCellValue("H3", "INSTRUCTOR");
$hoja->setCellValue("I3", "MESES X COMPETENCIA");
$hoja->setCellValue("J3", "MESES POR RESULTADO");


//texto fechas 
$hoja->setCellValue("L1", "ABRIL");
$hoja->setCellValue("L3", "LUNES");
$hoja->setCellValue("M3", "MARTES");
$hoja->setCellValue("N3", "MIERCOLES");
$hoja->setCellValue("O3", "JUEVES");
$hoja->setCellValue("P3", "VIERNES");


$n = 5;
$count = count($estructura);
$bordes = $count + 4;
$bordes2 = $bordes + 4;
$nini = 4;

$hoja->setCellValue("A4", 1);
$hoja->setCellValue("B4", "Resultado de Aprendizaje de la Inducción");
$hoja->setCellValue("C4", 48);
$hoja->setCellValue("D4", '=(D'. $bordes + 2 . '*C' . $n - 1 . ')/C' . $bordes + 2);
$hoja->setCellValue("E4", '=D' . $n -1 . '*8   ');
$hoja->setCellValue("F4", " ");
$hoja->setCellValue("G4", " ");
$hoja->setCellValue("H4", " ");
$hoja->setCellValue("I4", '=D' . $nini . '/(D' . $bordes + 2 . '/J1)');
$hoja->setCellValue("J4", '=I' . $nini . '/A' . $nini);


 foreach($estructura as $e){
    $c = ($e["tCompetencia"] == 1 ? "00B0F0" : "A9D08E");
    $spread
    ->getActiveSheet()
    ->getStyle('A'.$n. ':J'. $n)
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB($c);
   $hoja->setCellValue('A'.$n,$e['nResultados']);
   $hoja->setCellValue('B'.$n,$e['nombreEs']);
   $hoja->setCellValue('C'.$n,$e['totalHoras']);
   $hoja->setCellValue('D'.$n, '=(D'. $bordes + 2 . '*C' . $n .')/C'. $bordes + 2);
   $hoja->setCellValue('E'.$n,'=D' . $n . '*8');
   $hoja->setCellValue('F'.$n,' ');
   $hoja->setCellValue('G'.$n,'');
   $hoja->setCellValue('H'.$n,' ');
   $hoja->setCellValue('I'.$n,'=D' . $n . '/(D' . $bordes + 2 . '/J1)');
   $hoja->setCellValue('J'.$n,'=I'. $n . '/A' . $n);
   $n++;
 }

$hoja->setCellValue("A".$n, 1);
$hoja->setCellValue("B". $n, "Resultados de aprendizaje etapa practica");
$hoja->setCellValue("C" . $n, 0);
$hoja->setCellValue("D" . $n, '=(D'. $bordes + 2 . '*C' . $n . ')/C' . $bordes + 2);
$hoja->setCellValue("E" . $n, '=D' . $n . '*8');
$hoja->setCellValue("F" . $n, " ");
$hoja->setCellValue("G" . $n, " ");
$hoja->setCellValue("H" . $n, " ");
$hoja->setCellValue("I" .$n, '=D' . $n . '/(D' . $bordes + 2 . '/J1)');
$hoja->setCellValue("J" .$n, '=I' . $n . '/A' . $n);


 $hoja->setCellValue('A'.$n + 1,'=SUM(A'.$nini.':A'.($n).')');
 $hoja->setCellValue('B'.$n + 1,'=COUNTA(B'.$nini.':B'.($n).')');
 $hoja->setCellValue('C'.$n + 1,'=SUM(C'.$nini.':C'.($n).')');
 $hoja->setCellValue('D'.$n + 1 ,'=SUM(C'. $n + 1 .'/8)');
 $hoja->setCellValue('E'.$n + 1,'=SUM(E'. $nini .':E' . $n-1 .')');

  $hoja->setCellValue('I'.$n + 1,'=SUM(I'. $nini .':I' . $n - 1 .')');
   $hoja->setCellValue('J'.$n + 1,'=SUM(J'. $nini .':J' . $n - 1 .')');


$fileName="Ejemplo3.xlsx";
# Crear un "escritor"
$writer = new xlsx($spread);
# Le pasamos la ruta de guardado

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
$writer->save('php://output');


?>