<?php include_once("../../index/forms/lib_fecha_texto.php"); ?>

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if ($_SESSION['rol'] != 3) {
    session_destroy();
        echo "<script>alert('ERROR Usted no tiene permiso');location.href='../../index/index.php'</script>";
        exit();
}
include_once("layout/header.php");
include("../controllers/cRegUser.php");
// include("../controllers/ajax_municipios.php");
?>
       <?php
            include_once("layout/sidebar.php");
       ?>
        
        <?php
     include("./layout/cabecera.php");
?>

    <!-- editar usuario -->
    <?php
    include("./layout/navitem.php");
    ?>
    <?php if(isset($_SESSION['h'])){ ?>
    <?php $coEdit = $_SESSION['h'];?>
<!-- /.container-fluid -->

<!-- fin editar usuario -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices inscritos por fechas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteFechas.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">                                         
                                                <label for="fechainicioreporte"><b>Fecha de inicio</b></label>
                                                <input type="date"  class="form-control" id="fechainicioreporte"  name="fechainicioreporte" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="fechafinreporte"><b>Fecha de fin</b></label>
                                                <input type="date"  class="form-control" id="fechafinreporte"  name="fechafinreporte" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancelRh=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <?php }elseif(isset($_SESSION['i'])){ ?>
                    <?php $i = $_SESSION['i'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices por Género</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteGenero.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="genero"><b>Género</b></label>
                                                <select name="genero" id="genero" class="form-control" required>
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($genero as $g){?>
                                                            <option value="<?= $g['id']?>" required><?=$g['nombregen']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?canceli=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>
                <!-- /.container-fluid -->
                <?php }elseif(isset($_SESSION['j'])){ ?>
                <?php $i = $_SESSION['j'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices registrados a la ficha</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteFicha.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12">
                                                <label for="ficha"><b>Convocatorias</b></label>
                                                <select name="ficha" id="ficha" class="form-control" required>
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($convocatorias as $g){?>
                                                            <option value="<?= $g['codigo']?>" required><?=$g['tipoCurso']?> en <?=$g['nombre']?> con <?=$g['codigo']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancelj=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>  
                <!-- /.container-fluid --> 
                <!-- /.container-fluid -->
                <?php }elseif(isset($_SESSION['k'])){ ?>
                <?php $i = $_SESSION['k'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices por Lugar de residencia</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteLugar.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">                                          
                                                <label for="departamento"><b>Departamento de residencia</b></label>
                                                <select class="form-control" id="departamento" name="departamento" required>
                                                    <option>Selecciona una opción</option>
                                                     <?php
                                                        foreach($depar as $d){?>

                                                            <option value="<?= $d['codigoDepartamento']?>" required><?=$d['nombreDepartamento'] ?></option>
                                                    <?php } ?>
                                                </select>                                         
                                            </div>
                                            <div class="form-group col-md-6">                                          
                                                <label for="Ciudad"><b>Ciudad</b></label>
                                                <select class="form-control" id="Ciudad" name="Ciudad">
                                                </select>                                         
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancelk=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>  
                <!-- /.container-fluid --> 
                <!-- /.container-fluid -->
                <?php }elseif(isset($_SESSION['q'])){ ?>
                <?php $i = $_SESSION['q'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices por rango de edad</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/cRegReportesAprendices.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">                                          
                                                <label for="departamento"><b>Departamento de residencia</b></label>
                                                <select class="form-control" id="departamento" name="departamento" required>
                                                    <option>Selecciona una opción</option>
                                                     <?php
                                                        foreach($depar as $d){?>

                                                            <option value="<?= $d['codigoDepartamento']?>" required><?=$d['nombreDepartamento'] ?></option>
                                                    <?php } ?>
                                                </select>                                         
                                            </div>
                                            <div class="form-group col-md-6">                                          
                                                <label for="Ciudad"><b>Ciudad</b></label>
                                                <select class="form-control" id="Ciudad" name="Ciudad">
                                                </select>                                         
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancelq=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>  
                <!-- /.container-fluid --> 
                <!-- /.container-fluid -->
                <?php }elseif(isset($_SESSION['l'])){ ?>
                <?php $i = $_SESSION['l'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices por jornadas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteJornada.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="jornada"><b>Jornada</b></label>
                                                <select name="jornada" id="jornada" class="form-control" >
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($jornada as $j){?>
                                                            <option value="<?= $j ['id']?>" required><?=$j ['nombrejor']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancell=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>  
                <!-- /.container-fluid --> 
                <!-- /.container-fluid -->
                <?php }elseif(isset($_SESSION['m'])){ ?>
                <?php $i = $_SESSION['m'];?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">              
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Aprendices por el tipo de curso</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/reportesAprendices/cRegExcelReporteTipocurso.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                           <div class="form-group col-md-12">
                                                <label for="tipoDeCurso"><b>Tipo de curso</b></label>
                                                <select name="tipoDeCurso" id="tipoDeCurso" class="form-control" required>

                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($tipoCurso as $tc){?>
                                                            <option value="<?= $tc['id']?>" required><?=$tc ['tipoCurso']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <a href="../controllers/cRegReportesAprendices.php?cancelm=1" class="btn btn-danger btn-block">Cancelar</a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-success btn-block" >Generar Reporte</button>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>  
                <!-- /.container-fluid -->                                 
                <?php }else{ ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Generar reportes</h6>
                                </div>
                                <!-- Card Body -->
                                <style>
                                    #texto{
                                        font-size: 18px;
                                        font-weight: bold;
                                        color: black;
                                    }  
                                    #lista{
                                        text-decoration: none;
                                        color: black;
                                        transition: 0.3s;
                                    }
                                    #lista:hover{
                                        text-decoration: underline;
                                    }
                                </style>
                                <div class="card-body">
                                    <p id="texto">Para generar reportes sobre aprendices tenemos las siguientes opciones:</p>
                                    <ul>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reporteFechas=1">Reporte de inscritos entre fechas</a></li>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reporteGenero=1">Reporte por género</a></li>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reporteFicha=1">Reporte por ficha</a></li>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reporteLugar=1">Reporte por lugar de residencia</a></li>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reporteJonada=1">Reporte por jornada</a></li>
                                        <li><a id="lista" href="../controllers/cRegReportesAprendices.php?reportetipoCurso=1">Reporte por tipo de curso</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <?php } ?>



                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Usuarios registrados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableReportes" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Tipo de Documento</th>
                                            <th>Num de Documento</th>
                                            <th>Género</th>
                                            <th>Num Celular</th>
                                            <th>Correo</th>
                                            <th>Tipo de poblacion</th>
                                            <th>Fecha de inscripcion</th>
                                            <th>Departamento de residencia</th>
                                            <th>Ciudad de residencia</th>                                                         
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Tipo de Documento</th>
                                            <th>Num de Documento</th>
                                            <th>Género</th>
                                            <th>Num Celular</th>
                                            <th>Correo</th>
                                            <th>Tipo de poblacion</th>
                                            <th>Fecha de inscripcion</th>
                                            <th>Departamento de residencia</th>
                                            <th>Ciudad de residencia</th>          
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    date_default_timezone_set("America/Bogota");
                                    if(empty($aprendices)){
                                        $filtroConvocatoria = false;
                                    }else{
                                        $i= 1;
                                        foreach($aprendices As $c){?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?=$c['nombre']?></td> 
                                            <td><?=$c['apellidos']?></td>
                                            <td><?=$c['nombretd']?></td>
                                            <td><?=$c['nDoc']?></td>
                                            <td><?=$c['nombregen']?></td>
                                            <td><?=$c['numerocel']?></td> 
                                            <td><?=$c['correo']?></td>
                                            <td><?=$c['nombrepob']?></td> 
                                            <td><?=fechaATexto($c['fechaper'])?></td> 
                                            <td><?=$c['nombreDepartamento']?></td>
                                            <td><?=$c['nombreCiudad']?></td>                                    
                                        </tr>   
                                        <?php $i++; ?>                                          
                                            <?php } } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                
            </div>
            <!-- End of Main Content -->

            

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Convocatoria</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="texto" class="modal-body"><?php echo $_SESSION['nombre']?>, ¿esta seguro de eliminar este registro?</div>
                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a id="botonconfirmar" class="btn btn-success btn-block" href="#">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
<?php
    include_once("layout/footer.php");
?>
 <script src="../js/demo/municipio.js"></script>