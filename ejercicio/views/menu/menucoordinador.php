<!-- Begin Page Content -->
<div class="container-fluid">


<?php
    $estudiantes = $contarAprendices[0]['contar'];
    $instructores = $contarInstructores[0]['contar'];
    $coordinadores = $contarCoordinadores[0]['contar'];

    date_default_timezone_set('America/Bogota');
    $fecha = date("Y-m-d");
    $i=0;

    foreach($contarConvocatorias AS $c){
        $a = $c['fecha_fin'];
        if($a >= $fecha){
            $i++;
        }
        
    }
    $convocatorias = $i;
    
?>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Estudiantes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$estudiantes?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Instructores</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$instructores?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Coordinadores</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$coordinadores?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Convocatorias activas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$convocatorias?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
?>

<!-- Content Row -->

<div class="row">


    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Reporte estadistico sobre registros de aprendices <?=$_SESSION['fechaactual']?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="registros"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Reporte sobre genero del aplicativo de aprendices</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="generos"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Femenino
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Masculino
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Indefinido
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$tecnologo = $contarTecnologo[0]['COUNT(r.id)'];
$tecnico = $contarTecnico[0]['COUNT(r.id)'];
$complementario = $contarComplementario[0]['COUNT(r.id)'];

$total = $tecnologo + $tecnico + $complementario;

$t1 = $tecnologo*100/$total;
$t2 = $tecnico*100/$total;
$t3 = $complementario*100/$total;   




?>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
             <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte estadistico sobre registros de estudiantes por edad</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="edades"></canvas>
                    </div>
                </div>
            </div>
        </div>

<?php

$dia = $contarJornadaDia[0]['contar'];
$tarde = $contarJornadaTarde[0]['contar'];
$noche = $contarJornadaNoche[0]['contar'];
$findesemana = $contarJornadaFds[0]['contar'];
$virtual = $contarJornadaVirtual[0]['contar'];


$totalj = $dia + $tarde + $noche + $findesemana + $virtual;

$d = $dia*100/$totalj;
$t = $tarde*100/$total;
$n = $noche*100/$total;
$fds = $findesemana*100/$totalj;
$v = $virtual*100/$totalj;

 


?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Porcentaje de estudiantes por jornada</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Dia : <?=$dia?><span
                        class="float-right"><?php echo $d . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:<?=$d?>%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Tarde : <?=$tarde?><span
                        class="float-right"><?php echo $t . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:<?=$t?>%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Noche : <?=$noche?><span
                        class="float-right"><?php echo $n . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width:<?=$n?>%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Fines de semana : <?=$findesemana?><span
                        class="float-right"><?php echo $fds . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?=$fds?>%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Virtual : <?=$virtual?><span
                        class="float-right"><?php echo $v . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-dark" role="progressbar" style="width:<?=$v?>%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

               <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Enfoque del aplicativo</h6>
            </div>
            <div class="card-body">
                El SENA cuenta con una plataforma virtual llamada, SOFIAPlus: es la abreviación de Sistema Optimizado para la 
                Formación Integral del Aprendizaje Activo; permite a cualquier persona acceder a un programa de 
                formación complementaria y titulada.
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Porcentaje de estudiantes por tipo de curso</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Tecnologo : <?=$tecnologo?><span
                        class="float-right"><?php echo $t1 . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:<?=$t1?>%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Tecnico : <?=$tecnico?><span
                        class="float-right"><?php echo $t2 . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:<?=$t2?>%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Complementario : <?=$complementario?><span
                        class="float-right"><?php echo $t3 . "%" ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width:<?=$t3?>%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Video explicativo</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yGrnBIpn5q8?si=HDKIV0a4Ke88edd4"></iframe>
                    </div>
                </div>  
            </div>
        </div>



    </div>
</div>

</div>
<!-- /.container-fluid -->
