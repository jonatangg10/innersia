
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
    <?php if(isset($_SESSION['galeriaOne'])){ ?>
    <?php $coEdit = $_SESSION['galeriaOne'];?>
            
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
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
               

                <div class="card-body">
                <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">                                         
                            <label for="nombregaleria"><b>Ingrese el nombre de la imagen</b></label>
                            <input value="<?=$coEdit[0]['nombre']?>" type="text" class="form-control" id="nombregaleria" Placeholder="Ingrese nombre de la imagen" name="nombregaleria" required>                                        
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="descripciongaleria"><b>Ingrese descripcion de la imagen</b></label>
                            <textarea name="descripciongaleria" id="descripciongaleria" cols="30" rows="5" class="form-control" Placeholder="Ingrese descripcion de la imagen" required><?php echo $coEdit[0]['descripcion']?></textarea>
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="fotogaleria"><b>Ingrese la imagen</b></label>
                            <input type="file" class="form-control" id="fotogaleria"  name="fotogaleria">                                        
                        </div>
                        <input type="hidden" name="idgaleria" value="<?=$coEdit[0]['id']?>" readonly>
                    
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block">Editar</button>
                        </div>
                        <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?canceleditargaleria=1" class="btn btn-danger btn-block">Cancelar</a>
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

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar nueva imagen a la galeria</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/cRegCurso.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-12">                                         
                                                <label for="Renombregaleria"><b>Ingrese el nombre de la imagen</b></label>
                                                <input type="text" class="form-control" id="Renombregaleria" Placeholder="Ingrese el nombre de la imagen" name="Renombregaleria" required>                                        
                                            </div>
                                            
                                            <div class="form-group col-md-12">                                         
                                                <label for="Rdescripciongaleria"><b>Ingrese descripcion de la imagen</b></label>
                                                <textarea name="Rdescripciongaleria" id="Rdescripciongaleria" cols="30" rows="5" class="form-control" Placeholder="Ingrese descripcion de la imagen" required></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">                                         
                                                <label for="Rfotogaleria"><b>Ingrese la imagen</b></label>
                                                <input type="file" class="form-control" id="Rfotogaleria"  name="Rfotogaleria" required>                                        
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Registrar</button>
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
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    if(!empty($galeria)){    
                                        foreach($galeria As $g){?>
                                        <tr>
                                            <td><?=$g['id']?></td>
                                            <td><?=$g['nombre']?></td>     
                                            <td><?=$g['descripcion']?></td>
                                            <td style="text-align: center ;"><img src="../../index/assets/img/gallery/<?=$g['foto']?>" height="100px"></td>
                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegUser.php?editargaleria=<?=$g['id']?>" title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center;">   
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $g['id'] ?>,'<?=$g['nombre']?>');">
                                                    <i class="fa fa-trash"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                        <script>
                                        function recibir_id(id,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                         let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                         let href = '../controllers/cRegUser.php?eliminar_galeria=' + id;
                                         enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar el registro de "+nombre+" con id de: "+id+" ?";
                                        }
                                        </script>
                                            
                                            <?php } }else{
                                                $galeria = false;
                                            } ?>
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