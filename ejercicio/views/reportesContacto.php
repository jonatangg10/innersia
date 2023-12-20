<?php include_once("../../index/forms/lib_fecha_texto.php"); ?>

<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if ($_SESSION['rol'] != 4) {
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
    <?php if(isset($_SESSION['con1'])){ ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Reporte de solicitudes de contacto entre fechas</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form action="../controllers/reportesContacto/cRegExcelReporteFechas.php" method="POST" enctype="multipart/form-data">
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
                                        <a href="../controllers/cRegReportesEventos.php?cancelcon1=1" class="btn btn-danger btn-block">Cancelar</a>
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
                
    <?php }elseif(isset($_SESSION['con2'])){?>

    <?php }else{?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Generar reportes sobre solicitudes de contacto</h6>
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
                            <p id="texto">Para generar reportes sobre solicitudes de contacto tenemos las siguientes opciones:</p>
                            <ul>
                                <li><a id="lista" href="../controllers/cRegReportesEventos.php?reporteFechasCon=1">Reporte de solicitudes de contacto entre fechas</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>




                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registros de solicitudes de contacto</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCursos" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo electronico</th>
                                            <th>Numero de celular</th> 
                                            <th>Fecha de solicitud</th>
                                            <th>Asunto</th> 
                                            <th>Mensaje</th>                                      
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo electronico</th>
                                            <th>Numero de celular</th>
                                            <th>Fecha de solicitud</th>
                                            <th>Asunto</th> 
                                            <th>Mensaje</th>           
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    date_default_timezone_set("America/Bogota");
                                    if(empty($contacto)){
                                        $contacto = false;
                                    }else{
                                        $i = 1;
                                        foreach($contacto As $c){?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$c['nombres']?></td>
                                            <td><?=$c['apellidos']?></td> 
                                            <td><?=$c['correo']?></td>
                                            <td><?=$c['celular']?></td>
                                            <td><?=$c['fecha']?></td>
                                            <td><?=$c['asunto']?></td>
                                            <td><?=$c['mensaje']?></td>
                                        </tr>                                            
                                            <?php $i++; } } ?>
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