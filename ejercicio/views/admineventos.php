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
    <?php if(isset($_SESSION['eventoOne'])){ ?>
    <?php $coEdit = $_SESSION['eventoOne'];?>
            
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Editar información del evento</h6>
                </div>
                <!-- Card Body -->
               

                <div class="card-body">
                <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">                                         
                            <label for="ecnombreevento"><b>Ingrese el nombre del evento</b></label>
                            <input value="<?=$coEdit[0]['nombre']?>" type="text" class="form-control" id="ecnombreevento" Placeholder="Ingrese nombre de la convocatoria" name="ecnombreevento" required>                                        
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="ecfechaevento"><b>Fecha del evento</b></label>
                            <input type="date"  value="<?=$coEdit[0]['fecha']?>" class="form-control" id="ecfechaevento"  name="ecfechaevento"  required>
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="ecdescripcionevento"><b>Ingrese descripcion de la convocatoria</b></label>
                            <textarea class="form-control" name="ecdescripcionevento" id="ecdescripcionevento" cols="30" rows="5" Placeholder="Ingrese una descripcion" value="" required><?php echo $coEdit[0]['descripcion']?></textarea>
                                                                   
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="ecfotoevento"><b>Ingrese una imagen de la convocatoria</b></label>
                            <input type="file" class="form-control" id="ecfotoevento"  name="ecfotoevento">                                        
                        </div>
                        <input type="hidden" name="idevento" value="<?=$coEdit[0]['id']?>" readonly>
                    
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block">Editar</button>
                        </div>
                        <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?canceleditarevento=1" class="btn btn-danger btn-block">Cancelar</a>
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

<!-- fin editar usuario -->


<?php }else{ ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                 



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar nuevo evento</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">                                         
                                                <label for="nombreevento"><b>Ingrese el nombre del evento</b></label>
                                                <input type="text" class="form-control" id="nombreevento" Placeholder="Ingrese el nombre de la convocatoria" name="nombreevento" required>                                        
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="fechaevento"><b>Fecha del evento</b></label>
                                                <input type="date"  class="form-control" id="fechaevento"  name="fechaevento" value="" required>
                                            </div>
                                            <div class="form-group col-md-12">                                         
                                                <label for="descripcionevento"><b>Ingrese descripcion del evento</b></label>
                                                <textarea name="descripcionevento" id="descripcionevento" cols="30" rows="5" class="form-control" Placeholder="Escribe una descripcion" required></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">                                         
                                                <label for="fotoevento"><b>Ingrese una imagen del evento</b></label>
                                                <input type="file" class="form-control" id="fotoevento"  name="fotoevento" required>                                        
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Registrar Evento</button>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <input type="reset" class="btn btn-danger btn-block">
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
<?php } ?>


                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registros de Convocatorias</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    date_default_timezone_set("America/Bogota");
                                    if(empty($eventos)){
                                        $filtroConvocatoria = false;
                                    }else{
                                        foreach($eventos As $c){?>
                                        <tr class="<?php if(strtotime($c['fecha'])<strtotime(date('Y-m-d'))){
                                                            echo'tr-vencida';
                                                        }else if(strtotime($c['fecha'])>strtotime(date('Y-m-d'))){
                                                            echo'tr-valida';
                                                        }else if(strtotime($c['fecha'])==strtotime(date('Y-m-d'))){
                                                            echo'tr-pendiente';
                                                        }
                                                            ?>">
                                            <td><?=$c['id']?></td>
                                            <td><?=$c['nombre']?></td>
                                            <td><?=fechaATexto($c['fecha'])?></td>
                                            <td><?=$c['descripcion']?></td>
                                            <td><img src="../../index/assets/img/eventos/<?=$c['foto']?>" class="w-100 h-100"> </td>
                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegUser.php?editarevento=<?=$c['id']?>" title="Editar">
                                                    <i class="fa fa-edit icono-blanco"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center;">   
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $c['id'] ?>,'<?=$c['nombre']?>');">
                                                    <i class="fa fa-trash icono-blanco"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                        <script>
                                        function recibir_id(id,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                         let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                         let href = '../controllers/cRegUser.php?eliminar_evento=' + id;
                                         enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar el registro de "+nombre+" con id de: "+id+" ?";
                                        }
                                        </script>
                                            
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