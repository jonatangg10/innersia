<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if ($_SESSION['rol'] != 1 && $_SESSION['rol'] !=3) {
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

    <?php if(isset($_SESSION['receptores'])){
        $existentes = count($_SESSION['receptores']);
      if($existentes == 1){
            $usu = "usuario";
            $dis = "disponible";
        }else{
            $usu = "usuarios";
            $dis = "disponibles";

        }
        $receptores = $_SESSION['receptores'] ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Notificar a un <?= $_SESSION['receptores'][0]['nombrerol'] ?> </h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
                    </div>



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $existentes?> <?= $usu?> <?= $dis?> para notificar</h6>
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
                                    <form action="../controllers/cNotificaciones.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                           
                                            <div class="form-group col-md-12">
                                                <label for="docu_receptor"><b>Seleccione usuario </b></label>
                                                <select name="docu_receptor" id="docu_receptor" class="form-control" required >
                                                    <option value="">Usuarios existentes</option>
                                                    <?php
                                                        foreach($receptores as $j){?>
                                                            <option value="<?= $j ['nDoc']?>" required><?=$j ['nombre']?>  <?=$j ['apellidos']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">                                         
                                                <label for="titulo"><b>Ingresa titulo del mensaje</b> (maximo 25 caracteres)</label>
                                                <input  type="text" class="form-control" id="titulo" maxlength="25" name="titulo" required>                                        
                                             </div>                                  
                                            <div class="form-group col-md-8">
                                                <label for="texto"><b>Ingresa descripcion del mensaje</b>(maximo 150 caracteres)</label>
                                                <textarea class="form-control" name="texto" id="texto" cols="30" rows="8" maxlength="150" Placeholder="Ingresa un mensaje" value="" required></textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="tiponoti"><b>Seleccione usuario </b></label>
                                                <select name="tiponoti" id="tiponoti" class="form-control" required >
                                                    <option  value="">Tipo de mensaje</option>
                                                    <option class="bg-success" value="aviso">Aviso</option>
                                                    <option class="bg-warning" value="previo">Aviso previo</option>
                                                    <option class="bg-danger" value="urgente">Aviso urgente</option>
                                                    
                                                </select>
                                            </div>
                                        

                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Enviar</button>
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