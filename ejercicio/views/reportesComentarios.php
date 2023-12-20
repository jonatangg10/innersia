<?php include_once("../../index/forms/lib_fecha_texto.php"); ?>

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if ($_SESSION['rol'] == 3 OR $_SESSION['rol'] == 4) {
    
}else{
    session_destroy();
    echo "<script>alert('ERROR Usted no tiene permiso');location.href='../../index.php'</script>";
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

   
<?php
    include("./layout/navitem.php");
?>

<?php if(isset($_SESSION['com1'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por fechas</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/reportesComentarios/cRegExcelReporteFechas.php" method="POST" enctype="multipart/form-data">
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
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom1=1" class="btn btn-danger btn-block">Cancelar</a>
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

<?php }elseif(isset($_SESSION['com2'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por generos</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/reportesComentarios/cRegExcelReporteGenero.php" method="POST" enctype="multipart/form-data">
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
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom2=1" class="btn btn-danger btn-block">Cancelar</a>
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

<?php }elseif(isset($_SESSION['com3'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por rango de edad</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/reportesComentarios/cRegExcelReporteGenero.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">                                         
                                    <label for="edadinicio"><b>Edad de inicio</b></label>
                                    <input type="number" min="1" maxlength="3" oninput="maxlengthNumber(this);" class="form-control" id="fechainicioreporte"  name="fechainicioreporte" value="" required>
                                </div>
                                <div class="form-group col-md-6">                                         
                                    <label for="edadfin"><b>Edad de fin</b></label>
                                    <input type="number" min="1" maxlength="3" oninput="maxlengthNumber(this);" class="form-control" id="fechafinreporte"  name="fechafinreporte" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom3=1" class="btn btn-danger btn-block">Cancelar</a>
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
                        <script>
                            // Funcion para limitar la cantidad de numeros a escribir
                            function maxlengthNumber(obj){
                                if(obj.value.length > obj.maxLength){
                                    obj.value = obj.value.slice(0, obj.maxLength);
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }elseif(isset($_SESSION['com4'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por jornada</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/reportesComentarios/cRegExcelReporteJornada.php" method="POST" enctype="multipart/form-data">
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
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom4=1" class="btn btn-danger btn-block">Cancelar</a>
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

<?php }elseif(isset($_SESSION['com5'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por tipo de curso</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/cRegReportesComentarios.php" method="POST" enctype="multipart/form-data">
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
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom5=1" class="btn btn-danger btn-block">Cancelar</a>
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


<?php }elseif(isset($_SESSION['com6'])){?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Reporte de comentarios por puntuacion</h6>           
                    </div>
                    <div class="card-body">
                        <form action="../controllers/reportesComentarios/cRegExcelReportePuntuacion.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="pi"><b>Puntuación inicial</b></label>
                                    <select name="pi" id="pi" class="form-control" >
                                        <option value="">Selecciona una opción</option>
                                        <?php foreach(range(1,5) AS $n){?>
                                            <option value="<?=$n?>"><?=$n?></option>
                                        <?php }?> 
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pf"><b>Puntuación final</b></label>
                                    <select name="pf" id="pf" class="form-control" >
                                        <option value="">Selecciona una opción</option>
                                        <?php foreach(range(1,5) AS $n){?>
                                            <option value="<?=$n?>"><?=$n?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <a href="../controllers/cRegReportesComentarios.php?cancelcom6=1" class="btn btn-danger btn-block">Cancelar</a>
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
    
<?php }else{?>
                   
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Generar reportes sobre comentarios sobre el aplicativo</h6>
                    </div>
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
                        <p id="texto">Para generar reportes sobre comentarios al aplicativo tenemos las siguientes opciones:</p>
                        <ul>
                            <li><a id="lista" href="../controllers/cRegReportesComentarios.php?reporteFechas=1">Reporte de comentarios entre fechas</a></li>
                            <li><a id="lista" href="../controllers/cRegReportesComentarios.php?reporteGenero=1">Reporte de comentarios por género</a></li>
                            <li><a id="lista" href="../controllers/cRegReportesComentarios.php?reporteJonada=1">Reporte de comentarios por jornada</a></li>
                            <li><a id="lista" href="../controllers/cRegReportesComentarios.php?reportePuntuacion=1">Reporte de comentarios entre puntuaciones</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }?>



            



                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registros de Comentarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCursos" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Ocupacion</th>
                                            <th>Comentario</th>
                                            <th>Puntuacion</th>
                                            <th>Fecha</th> 
                                                                           
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Ocupacion</th>
                                            <th>Comentario</th>
                                            <th>Puntuacion</th>
                                            <th>Fecha</th>           
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    date_default_timezone_set("America/Bogota");
                                    if(empty($comentarios)){
                                        $filtroConvocatoria = false;
                                    }else{
                                        foreach($comentarios As $c){?>
                                        <tr>
                                            <td><?=$c['id']?></td>
                                            <td><?=$c['nombre']?></td> 
                                            <td><?=$c['apellidos']?></td>
                                            <td><?=$c['nombrerol']?></td> 
                                            <td><?=$c['comentario']?></td>
                                            <td><?=$c['puntuacion']?></td>
                                            <td><?=$c['fecha']?></td>                                    
                                        </tr>                                            
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