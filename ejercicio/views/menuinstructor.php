<?php
include_once("layout/header.php");
include("../controllers/cRegUser.php");
?>
<?php
     include_once("layout/sidebar.php");
?>
<?php
     include("./layout/cabecera.php");
?>
<?php
    include("./layout/navitem.php");
    include("../controllers/lib_fecha_texto.php");
?>
                
<?php

$fecha_nacimiento = new DateTime($_SESSION['fechanacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$simple = $edad->y;

?>



<!-- Si es mayor de edad debe actualizar los datos -->
<?php 
 if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if(isset($_SESSION['tipodocumento']) && $_SESSION['tipodocumento']!=2 && $simple>=18 ){ ?>

  <div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $simple ?></h6>
                </div>
                <!-- Card Body -->
               

                <div class="card-body">
                        <div class="row">

                        <div class="form-group col-md-12 text-center">
                            <h3><p>Debido a que tienes la mayoria de edad y en el sistema tienes un tipo documento incorrecto debes actualizar para seguir con el aplicativo</p></h3>
                            </div>
                            <div class="form-group col-md-12">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#perfilactualizar">
                                <button class="btn btn-success btn-block">Actualizar</button>
                            </a>
                            </div>
                                            
                            <?php if(isset($_SESSION['mensaje'])): ?>
                            <div class="form-group col-md-12">
                                <div class="alert alert-<?=$_SESSION['tipo_alert']?> alert-dismoissible fade show" role="alert">
                                    <?=$_SESSION['mensaje']?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                            </div>
                                <?php
                                    unset($_SESSION['tipo_alert']);
                                    unset($_SESSION['mensaje']);
                                ?>
                            <?php endif ?>
                        
                        </div> <!--Cierre del row-->                
                </div>
            </div>
        </div>
    </div>

</div>

     <div class="modal fade" id="perfilactualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">  
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar documento</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center " >
                         <img class="img-circle fotoperfil"  src="../img/perfil/<?= $_SESSION['foto']?>" width="150px" title="Foto de perfil"><hr>
                    </div> 
                    <br>                 
                     <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12">                                          
                                <label for="foto"><b>Tipo documento</b></label>
                                <select name="cambiodedocumento" id="cambiodedocumento" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    <?php
                                        foreach($tDocs as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$_SESSION['tipodocumento']? 'selected':''; ?> ><?=$td ['nombretd'];
                                            ?></option>
                                    <?php } ?>   
                                </select>                     
                            </div>
                            <div class="form-group col-md-12">                                         
                                <label for="adocumento"><b>Archivo del Documento de Identidad (<b style="color: red;">PDF</b>)</b></label>
                                <input type="file" class="form-control" id="adocumento"  name="adocumento" required>
                            </div>
                            <div class="form-group col-md-12">                                         
                                <label for="acertificado"><b>Certificacion del Documento de Identidad Registraduria (<b style="color: red;">PDF</b>)</b></label>
                                <input type="file" class="form-control" id="acertificado"  name="acertificado" required>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar Documento</button>
                            </div>
                            <?php if(isset($_SESSION['mensaje'])): ?>
                                <div class="form-group col-md-12">
                                    <div class="alert alert-<?=$_SESSION['tipo_alert']?> alert-dismoissible fade show" role="alert">
                                        <?=$_SESSION['mensaje']?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                </div>
                                    <?php
                                        unset($_SESSION['tipo_alert']);
                                        unset($_SESSION['mensaje']);
                                    ?>
                            <?php endif ?>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
     </div> 
     </div>
            <!-- End of Main Content -->
     <!-- fin -->
    <?php }else{ ?>

<?php if($_SESSION['rol'] == 1){?>
    <?php include('menu/menuinstructor.php');?>
<?php }elseif($_SESSION['rol'] == 2){?>
    <?php include('menu/menuaprendiz.php');?>
<?php }elseif($_SESSION['rol'] == 3){?>
   
    <?php include('menu/menucoordinador.php');?>
<?php }else{ ?>
    <?php include('menu/menuadministrador.php');?>
<?php } ?>

</div>
<!-- End of Main Content -->
 

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

<?php
    include_once("layout/footer.php");
    $h = $hombres[0]['COUNT(genero)'];
    $m = $mujeres[0]['COUNT(genero)'];
    $i = $indefinidos[0]['COUNT(genero)'];
?>

<!--Grafica de genero Coordinador-->
<script type="text/javascript">
    let hombres = <?= $h ?>;
    let mujeres = <?= $m ?>;
    let julian = <?= $i ?>;
var ctx = document.getElementById("generos");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Femenino", "Masculino", "Indefinido"],
    datasets: [{
      data: [mujeres, hombres, julian],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
<!--Fin-->

<?php

?>
<!--Grafica de registros Coordinador-->

<?php
    $ene = $registrosmeses[0];
    $feb = $registrosmeses[1];
    $mar = $registrosmeses[2];
    $abr = $registrosmeses[3];
    $may = $registrosmeses[4];
    $jun = $registrosmeses[5];
    $jul = $registrosmeses[6];
    $ago = $registrosmeses[7];
    $sep = $registrosmeses[8];
    $oct = $registrosmeses[9];
    $nov = $registrosmeses[10];
    $dic = $registrosmeses[11];
?>
<script>


// Area Chart Example
var enero = <?= $ene[0]['enero'] ?>;
let febrero = <?= $feb[0]['febrero'] ?>;
let marzo = <?= $mar[0]['marzo'] ?>;
let abril = <?= $abr[0]['abril'] ?>;
let mayo = <?= $may[0]['mayo'] ?>;
let junio = <?= $jun[0]['junio'] ?>;
let julio = <?= $jul[0]['julio'] ?>;
let agosto = <?= $ago[0]['agosto'] ?>;
let septiembre = <?= $sep[0]['septiembre']?>;
let octubre = <?= $oct[0]['octubre'] ?>;
let noviembre = <?= $nov[0]['noviembre'] ?>;
let diciembre = <?= $dic[0]['diciembre'] ?>;
var ctx = document.getElementById("registros");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    datasets: [{
      label: "Inscritos",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 9,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    }
  }
});
</script>

<!-- grafica mata -->


<!-- fin grafica mata -->
<!--Fin-->

<!---->


<?php
  date_default_timezone_set('America/Bogota');

  // 0-18

  $a1 =0;
  // estudiantes masculinos entre 19-22
  foreach($contar1 AS $c){
    $a = $c['fechanacimiento'];
    
    $feca1 = new DateTime($a);
    $ha1 = new DateTime();
    $ea1 = $ha1->diff($feca1);
    $aa1 = $ea1->y;
    if($aa1 >=0 && $aa1 <=18){
      // echo "mondaaaa";
      $a1++;       
    }     
    }
  $estuMasculinos18 =$a1;

  $b1 =0;
  // estudiantes femeninos entre 19-22
  foreach($contar2 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecb1 = new DateTime($a);
    $hb1 = new DateTime();
    $eb1 = $hb1->diff($fecb1);
    $ab1 = $eb1->y;
    if($ab1 >=0 && $ab1 <=18){
      // echo "mondaaaa";
      $b1++;       
    }     
    }
  $estuFem18 =$b1;

  $c1 =0;
  // estudiantes femeninos entre 19-22
  foreach($contar3 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecc1 = new DateTime($a);
    $hc1 = new DateTime();
    $ec1 = $hc1->diff($fecc1);
    $ac1 = $ec1->y;
    if($ac1 >=0 && $ac1 <=18){
      // echo "mondaaaa";
      $c1++;       
    }     
    }
  $estuInd18 =$c1;


  // fin 0-18

  // 19-22

  $a2 =0;
  // estudiantes masculinos entre 19-22
  foreach($contar1 AS $c){
    $a = $c['fechanacimiento'];
    
    $feca2 = new DateTime($a);
    $ha2 = new DateTime();
    $ea2 = $ha2->diff($feca2);
    $aa2 = $ea2->y;
    if($aa2 >=19 && $aa2 <=22){
      // echo "mondaaaa";
      $a2++;       
    }     
    }
  $estuMasculinos19 =$a2;

  $b2 =0;
  // estudiantes femeninos entre 19-22
  foreach($contar2 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecb2 = new DateTime($a);
    $hb2 = new DateTime();
    $eb2 = $hb2->diff($fecb2);
    $ab2 = $eb2->y;
    if($ab2 >=19 && $ab2 <=22){
      // echo "mondaaaa";
      $b2++;       
    }     
    }
  $estuFem19 =$b2;

  $c2 =0;
  // estudiantes indefinidos entre 19-22
  foreach($contar3 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecc2 = new DateTime($a);
    $hc2 = new DateTime();
    $ec2 = $hc2->diff($fecc2);
    $ac2 = $ec2->y;
    if($ac2 >=19 && $ac2 <=22){
      
      $c2++;       
    }     
    }
  $estuInd19 =$c2;

  // fin 19-22



  // 23-26

  $a3 =0;
  // estudiantes masculinos entre 23-26
  foreach($contar1 AS $c){
    $a = $c['fechanacimiento'];
    
    $feca3 = new DateTime($a);
    $ha3 = new DateTime();
    $ea3 = $ha3->diff($feca3);
    $aa3 = $ea3->y;
    if($aa3 >=23 && $aa3 <=26){
      // echo "mondaaaa";
      $a3++;       
    }     
    }
  $estuMasculinos23 =$a3;

  $b3 =0;
  // estudiantes femeninos entre 23-26
  foreach($contar2 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecb3 = new DateTime($a);
    $hb3 = new DateTime();
    $eb3 = $hb3->diff($fecb3);
    $ab3 = $eb3->y;
    if($ab3 >=23 && $ab3 <=26){
      // echo "mondaaaa";
      $b3++;       
    }     
    }
  $estuFem23 =$b3;

  $c3 =0;
  // estudiantes indefinidos entre 23-26
  foreach($contar3 AS $c){
    $a = $c['fechanacimiento'];
    
    $fecc3 = new DateTime($a);
    $hc3 = new DateTime();
    $ec3 = $hc3->diff($fecc3);
    $ac3 = $ec3->y;
    if($ac3 >=23 && $ac3 <=26){
      // echo "mondaaaa";
      $c3++;       
    }     
    }
  $estuInd23 =$c3;
  
  // fin 23-26





  // 27-29

  $a4 =0;
  // estudiantes masculinos entre 27-29
  foreach($contar1 AS $c){
      $a = $c['fechanacimiento'];
  
      $feca4 = new DateTime($a);
      $ha4 = new DateTime();
      $ea4 = $ha4->diff($feca4);
      $aa4 = $ea4->y;
      if($aa4 >=27 && $aa4 <=29){
          // echo "mondaaaa";
          $a4++;       
      }
      
  }
  $estuMasculinos27 =$a4;

  $b4 =0;
  // estudiantes femeninas entre 27-29
  foreach($contar2 AS $c){
      $a = $c['fechanacimiento'];
  
      $fecb4 = new DateTime($a);
      $hb4 = new DateTime();
      $eb4 = $hb4->diff($fecb4);
      $ab4 = $eb4->y;
      if($ab4 >=27 && $ab4 <=29){
          // echo "mondaaaa";
          $b4++;       
      }
      
  }
  $estuFem27 =$b4;

  $c4 =0;
  // estudiantes femeninas entre 27-29
  foreach($contar2 AS $c){
      $a = $c['fechanacimiento'];
  
      $fecc4 = new DateTime($a);
      $hc4 = new DateTime();
      $ec4 = $hc4->diff($fecc4);
      $ac4 = $ec4->y;
      if($ab4 >=27 && $ac4 <=29){
          // echo "mondaaaa";
          $c4++;       
      }
      
  }
  $estuInd27 =$c4;
  
  // fin 27-30



  // 30+

  $a5 =0;
  
  foreach($contar1 AS $c){
    // estudiantes masculinos mayores o igual a 30
      $a = $c['fechanacimiento'];
  
      $feca5 = new DateTime($a);
      $ha5 = new DateTime();
      $ea5 = $ha5->diff($feca5);
      $aa5 = $ea5->y;
      if($aa5 >= 30){
          // echo "mondaaaa";
          $a5++;       
      }
      
  }
  $estuMasculinos30mas =$a5;

  $b5 =0;
  // estudiantes femeninos mayores o igual a 30
  foreach($contar2 AS $c){
      $a = $c['fechanacimiento'];
  
      $fecb5 = new DateTime($a);
      $hb5 = new DateTime();
      $eb5 = $hb5->diff($fecb5);
      $ab5 = $eb5->y;
      if($ab5 >= 30){
          // echo "mondaaaa";
          $b5++;       
      }
      
  }
  $estuFem30mas =$b5;

  $c5 =0;
  // estudiantes indefenidos mayores o igual a 30
    foreach($contar3 AS $c){
      $a = $c['fechanacimiento'];
  
      $fecc5 = new DateTime($a);
      $hc5 = new DateTime();
      $ec5 = $hc5->diff($fecc5);
      $ac5 = $ec5->y;
      if($ac5 >= 30){
          // echo "mondaaaa";
          $c5++;       
      }
      
  }
  $estuInd30mas =$c5;
?>
<script>

let a1 = <?= $estuMasculinos18 ?>;
let b1 = <?= $estuFem18 ?>;
let c1 = <?= $estuInd18 ?>;

let a2 = <?= $estuMasculinos19 ?>;
let b2 = <?= $estuFem19 ?>;
let c2 = <?= $estuInd19 ?>;

let a3 = <?= $estuMasculinos23 ?>;
let b3 = <?= $estuFem23 ?>;
let c3 = <?= $estuInd23 ?>;

let a4 = <?= $estuMasculinos27 ?>;
let b4 = <?= $estuFem27 ?>;
let c4 = <?= $estuInd27 ?>;

let a5 = <?= $estuMasculinos30mas ?>;
let b5 = <?= $estuFem30mas ?>;
let c5 = <?= $estuInd30mas ?>;

var ctx = document.getElementById("edades");

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["0-18", "19-22", "23-26", "27-29", "30+"],
    datasets: 
    [
      {
      label: "Hombres",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [a1, a2, a3, a4, a5],
      },
      {
      label: "Mujeres",
      backgroundColor: "#FF0080",
      hoverBackgroundColor: "#FF0080",
      borderColor: "#FF0080",
      data: [b1, b2, b3, b4, b5],
      },
      {
      label: "Indefinidos",
      backgroundColor: "#9B9B9B",
      hoverBackgroundColor: "#9B9B9B",
      borderColor: "#9B9B9B",
      data: [c1, c2, c3, c4, c5],
      }

    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: true,
          drawBorder: true
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});

  


</script>

<!---->

<!-- Menu instructor -->

<!--Grafica 1-->

<?php

if(empty($_SESSION['ConvocatoriasInstructor'])){
        
}else{

  $i= 0;
  $c = $_SESSION['contador'];

  $count=count($_SESSION['ConvocatoriasInstructor']);
  $conv[] = $_SESSION['ConvocatoriasInstructor'];
  $j=0;
  $abc = 'a';

  do {
    $e =  $conv[$j]['codigo'];
    $letra = $abc . $e;
    
    
    ++$abc;
    $j++;
  }while($j == $c);
  
  
}

  



  do{ ?>
    
    <script>
      var ctx = document.getElementById("instructor<?=$i?>");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          datasets: [{
            label: "Competencias completadas",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [2, 1, 3, 2, 1, 3, 2.5, 1, 3, 2, 1, 3],
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 12
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 9,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '' + value;
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ' + tooltipItem.yLabel;
              }
            }
          }
        }
      });
    </script>

    

    <script type="text/javascript">
    
    var ctx = document.getElementById("instructorgen<?=$i?>");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Femenino", "Masculino", "Indefinido"],
        datasets: [{
          data: [10, 10, 5],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
    </script>

 <?php $i++; }while($i == $c)
?>

<!--Fin-->

<!-- grafica 2 -->

<?php
   
?>


<!-- fin -->


<!-- fin menu instructor -->


<!-- menu administrador -->

<!-- grafica 1 -->

<?php
    $ene = $comentariosmeses[0];
    $feb = $comentariosmeses[1];
    $mar = $comentariosmeses[2];
    $abr = $comentariosmeses[3];
    $may = $comentariosmeses[4];
    $jun = $comentariosmeses[5];
    $jul = $comentariosmeses[6];
    $ago = $comentariosmeses[7];
    $sep = $comentariosmeses[8];
    $oct = $comentariosmeses[9];
    $nov = $comentariosmeses[10];
    $dic = $comentariosmeses[11];
?>

<script>


// Area Chart Example
var Cenero = <?= $ene[0]['enero'] ?>;
let Cfebrero = <?= $feb[0]['febrero'] ?>;
let Cmarzo = <?= $mar[0]['marzo'] ?>;
let Cabril = <?= $abr[0]['abril'] ?>;
let Cmayo = <?= $may[0]['mayo'] ?>;
let Cjunio = <?= $jun[0]['junio'] ?>;
let Cjulio = <?= $jul[0]['julio'] ?>;
let Cagosto = <?= $ago[0]['agosto'] ?>;
let Cseptiembre = <?= $sep[0]['septiembre']?>;
let Coctubre = <?= $oct[0]['octubre'] ?>;
let Cnoviembre = <?= $nov[0]['noviembre'] ?>;
let Cdiciembre = <?= $dic[0]['diciembre'] ?>;
var ctx = document.getElementById("comentarios");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    datasets: [{
      label: "Inscritos",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [Cenero, Cfebrero, Cmarzo, Cabril, Cmayo, Cjunio, Cjulio, Cagosto, Cseptiembre, Coctubre, Cnoviembre, Cdiciembre],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 9,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    }
  }
});
</script>

<!-- fin grafica 1 -->

<!-- grafica 2 -->

<?php
    $adminh = $adminhombres[0]['masculinos'];
    $adminm = $adminmujeres[0]['femenina'];
    $admini = $adminindefinidos[0]['indefinidos'];
?>

<script type="text/javascript">
    let admfem = <?= $adminm ?>;
    let admasc = <?= $adminh ?>; 
    let adminde = <?= $admini ?>;
var ctx = document.getElementById("cgenero");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Femenino", "Masculino", "Indefinido"],
    datasets: [{
      data: [admfem, admasc, adminde],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

<!-- fin grafica 2 -->

<!-- grafica 3 -->

<?php
    $ene = $contactomeses[0];
    $feb = $contactomeses[1];
    $mar = $contactomeses[2];
    $abr = $contactomeses[3];
    $may = $contactomeses[4];
    $jun = $contactomeses[5];
    $jul = $contactomeses[6];
    $ago = $contactomeses[7];
    $sep = $contactomeses[8];
    $oct = $contactomeses[9];
    $nov = $contactomeses[10];
    $dic = $contactomeses[11];
?>

<script>
var C2enero = <?= $ene[0]['enero'] ?>;
let C2febrero = <?= $feb[0]['febrero'] ?>;
let C2marzo = <?= $mar[0]['marzo'] ?>;
let C2abril = <?= $abr[0]['abril'] ?>;
let C2mayo = <?= $may[0]['mayo'] ?>;
let C2junio = <?= $jun[0]['junio'] ?>;
let C2julio = <?= $jul[0]['julio'] ?>;
let C2agosto = <?= $ago[0]['agosto'] ?>;
let C2septiembre = <?= $sep[0]['septiembre']?>;
let C2octubre = <?= $oct[0]['octubre'] ?>;
let C2noviembre = <?= $nov[0]['noviembre'] ?>;
let C2diciembre = <?= $dic[0]['diciembre'] ?>;
var ctx = document.getElementById("adminmeses");

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: 
    [
      {
      label: "Solicitudes de contacto",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [C2enero, C2febrero, C2marzo, C2abril, C2mayo, C2junio, C2julio, C2agosto, C2septiembre, C2octubre, C2noviembre, C2diciembre],
      }
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: true,
          drawBorder: true
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + value;
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});
</script>
<!-- fin grafica 3 -->

<!-- fin menu administrador -->
