<!-- Begin Page Content -->
<div class="container-fluid">
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$contarAprendicesInstructor[0]['contar']?></div>
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
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Convocatorias activas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$contarConvocatoriasInstructor[0]['contar']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <?php
        $d = $contarJornadasInstructor1[0]['contar'];
        $t = $contarJornadasInstructor2[0]['contar'];
        $n = $contarJornadasInstructor3[0]['contar'];
        $v = $contarJornadasInstructor4[0]['contar'];
        $f = $contarJornadasInstructor5[0]['contar'];

        $total = $d + $t + $n + $v + $f;
        
    ?>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jornadas de trabajo</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total?></div>
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
                            Fecha Actual</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                        date_default_timezone_set("America/Bogota");
                        $fechaRegistro = date("Y-m-d");
                        echo fechaATexto2(date("Y-m-d"));
                        ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>

<!-- Content Row -->

<div class="row">

<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        // Si no está iniciada, la iniciamos
        session_start();
    }
        
    if(empty($_SESSION['ConvocatoriasInstructor'])){
        
    }else{
        $conv = $_SESSION['ConvocatoriasInstructor'];

        $count = count($conv);
        $i = 0;
        foreach($conv AS $c){ ?>

            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Progreso de carga academica de <?=$c['tipoCurso']?> en <?=$c['nombre']?></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="instructor<?=$i?>"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area Chart -->


            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Reporte de genero de <?=$c['nombre']?></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="instructorgen<?=$i?>"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Femeninas
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Masculinos
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Indefinidos
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        <?php $i++; }
            if (session_status() !== PHP_SESSION_ACTIVE) {
                // Si no está iniciada, la iniciamos
                session_start();
            }
            $_SESSION['contador'] = $i - 1;
    }


?>

</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Porcentaje de tiempo de durancion de cursos a cargo</h6>
            </div>
            <div class="card-body">
            <?php
                if(empty($_SESSION['ConvocatoriasInstructor'])){
        
                }else{
                    $conv1 = $_SESSION['ConvocatoriasInstructor'];
                    $r = 1;
                    foreach($conv1 AS $c){ ?>
                        
                        <h4 class="small font-weight-bold"><?=$c['nombre']?><span class="float-right">20%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        
                        
                    <?php } ?>

                <?php }
            ?>
            </div>
        </div>



    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ILUSTRACIONES</h6>
            </div>
            <div class="card-body">
            
                <p>Agregue algunas ilustraciones svg de calidad a su proyecto cortesía de unDraw, 
                    una colección constantemente actualizada de hermosas imágenes svg que puede usar 
                    completamente gratis y sin atribución.</p>
                
            </div>
        </div>

      

    </div>
</div>

</div>
<!-- /.container-fluid -->