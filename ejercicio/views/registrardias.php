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
                <!-- End of Topbar -->

    <!-- editar usuario -->
    <?php
    include("./layout/navitem.php");
    ?>
    <?php if(isset($_SESSION['mesesone'])){ ?>
    <?php $usEdit = $_SESSION['mesesone']?>
            
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Editar informacion del usuario</h6>
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
                    <form action="../controllers/cRegDias.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="eId" value="<?=$usEdit[0]['id']?>" readonly required>
                            <div class="form-group col-md-4">                                         
                                <label for="eDias"><b>Dias</b></label>
                                <input type="number" min="0"  maxlength="2" oninput="maxlengthNumber(this);" class="form-control" id="eDias" name="eDias" value="<?=$usEdit[0]['dias']?>"required>
                            </div>
                            <script>
                                // Funcion para limitar la cantidad de numeros a escribir
                                function maxlengthNumber(obj){
                                    if(obj.value.length > obj.maxLength){
                                        obj.value = obj.value.slice(0, obj.maxLength);
                                    }
                                }
                            </script>
                            <div class="form-group col-md-4">  
                                <label for="eMes"><b>Mes</b></label>
                                <select name="eMes" id="eMes" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($meses as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$usEdit[0]['nombreMes']? 'selected':''; ?> ><?=$td ['nombremes']; ?></option>
                                    <?php } ?>           
                                </select>
                            </div>
                            <div class="form-group col-md-4">                                         
                                <label for="eAño"><b>Año</b></label>
                                <input type="number" min="0"  maxlength="4" oninput="maxlengthNumber(this);" class="form-control" id="eAño" name="eAño" value="<?=$usEdit[0]['año']?>"required>
                            </div>
                            <script>
                                // Funcion para limitar la cantidad de numeros a escribir
                                function maxlengthNumber(obj){
                                    if(obj.value.length > obj.maxLength){
                                        obj.value = obj.value.slice(0, obj.maxLength);
                                    }
                                }
                            </script>
                            <?php if(isset($_SESSION['mensajes'])): ?>
                                <div class="form-group col-md-12">
                                    <div class="alert alert-<?=$_SESSION['tipo_alerta']?> alert-dismoissible fade show" role="alert">
                                        <?=$_SESSION['mensajes']?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                </div>
                                    <?php
                                        unset($_SESSION['tipo_alerta']);
                                        unset($_SESSION['mensajes']);
                                    ?>
                            <?php endif ?>
                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar</button>
                            </div>

                            <div class="form-group col-md-6">
                                <a href="../controllers/cRegDias.php?cancelEdit=1" class="btn btn-danger btn-block">Cancelar</a>
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

<?php } else{ ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar Dias Habiles de Estudio</h6>
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
                                    <form action="../controllers/cRegDias.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="form-group col-md-4">                                         
                                                <label for="dias"><b>Dias de estudio</b></label>
                                                <input type="number" min="0" class="form-control"  maxlength="2" oninput="maxlengthNumber(this);" id="dias" Placeholder="Ingrese el numero de dias" name="dias" value="" required>
                                            </div>
                                            <script>
                                                // Funcion para limitar la cantidad de numeros a escribir
                                                function maxlengthNumber(obj){
                                                    if(obj.value.length > obj.maxLength){
                                                        obj.value = obj.value.slice(0, obj.maxLength);
                                                    }
                                                }
                                            </script>
                                            <div class="form-group col-md-4">  
                                                <label for="mes"><b>Mes</b></label>
                                                <select name="mes" id="mes" class="form-control" required>
                                                    <option value="">Selecciona una opcion</option>
                                                    <?php
                                                        foreach($meses as $td){?>
                                                            <option value="<?= $td ['id']?>" required><?=$td ['nombremes']?></option>
                                                    <?php } ?>           
                                                </select>
                                            </div>
                        
                                            <div class="form-group col-md-4">                                         
                                                <label for="año"><b>Año</b></label>
                                                <input type="number" min="0" class="form-control"  maxlength="4" oninput="maxlengthNumber(this);" id="año" Placeholder="Ingrese el Año" name="año" value="" required>
                                            </div>
                                            <script>
                                                // Funcion para limitar la cantidad de numeros a escribir
                                                function maxlengthNumber(obj){
                                                    if(obj.value.length > obj.maxLength){
                                                        obj.value = obj.value.slice(0, obj.maxLength);
                                                    }
                                                }
                                            </script>
                                            
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Registrarse</button>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <input type="reset" class="btn btn-danger btn-block">
                                            </div>                                                            
                                            <?php if(isset($_SESSION['mensajes'])): ?>
                                            <div class="form-group col-md-12">
                                                <div class="alert alert-<?=$_SESSION['tipo_alerta']?> alert-dismoissible fade show" role="alert">
                                                    <?=$_SESSION['mensajes']?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                            </div>
                                                <?php
                                                    unset($_SESSION['tipo_alerta']);
                                                    unset($_SESSION['mensajes']);
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
                            <h6 class="m-0 font-weight-bold text-primary">Dias habiles de estudio por mes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableDias" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Dias</th>
                                            <th>Nombre del Mes</th>
                                            <th>Año</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Dias</th>
                                            <th>Nombre del Mes</th>
                                            <th>Año</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                    <?php
                                    
                                    if(empty($dias)){
                                        $dias = false;
                                    }else{
                                        foreach($dias As $u){?>
                                        <tr>
                                            
                                            <td><?=$u['nombremes']?></td>
                                            <td><?=$u['dias']?> Dias</td>
                                            <td><?=$u['año']?></td>
                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegDias.php?editUser=<?=$u['id']?>" title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center;">   
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminar" onclick="recibir_id(<?= $u['id'] ?>,'<?=$u['nombremes']?>');">
                                                    <i class="fa fa-trash"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                            <?php  }  } ?>
                                    </tbody>
                                </table>
                                <script>
                                        function recibir_id(id,nombremes) {
                                        let modal = document.getElementById("eliminar");
                                        let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                        let href = '../controllers/cRegDias.php?eliminar_id=' + id;
                                        enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar el registro de " + nombremes + " ?";
                                        }
                                </script>
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
    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Mes</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <div id="texto" class="modal-body" style="text-align: center;font-weight: bold;"><?php echo $_SESSION['nombre']?> ¿esta seguro de eliminar este registro?</div>
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