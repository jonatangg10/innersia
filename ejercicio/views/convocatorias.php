<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if ($_SESSION['rol'] != 1) {
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
    <?php if(isset($_SESSION['convOne'])){ ?>
    <?php $coEdit = $_SESSION['convOne'];?>
            
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
                    <h6 class="m-0 font-weight-bold text-primary">Editar información de la convocatoria</h6>  
                </div>
                <!-- Card Body -->
               

                <div class="card-body">
                <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">                                         
                            <label for="ecnombre"><b>Ingrese el nombre de la convocatoria</b></label>
                            <input value="<?=$coEdit[0]['nombre']?>" type="text" class="form-control" id="ecnombre" Placeholder="Ingrese nombre de la convocatoria" name="ecnombre" required>                                        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="etipoCurso"><b>Tipo de curso</b></label>
                            <select name="etipoCurso" id="etipoCurso" class="form-control" >
                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($tipoCurso as $tc){?>
                                        <option value="<?= $tc['id']?>" <?= $tc['id']==$coEdit[0]['tCurso']?'selected':''?> required><?=$tc ['tipoCurso']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ecid_jornada"><b>Ingrese Jornada </b></label>
                            <select name="ecid_jornada" id="ecid_jornada" class="form-control" >
                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($jornada as $j){?>
                                        <option value="<?= $j['id']?>" <?= $j['id']==$coEdit[0]['id_jornada']?'selected':''?> required><?=$j ['nombrejor']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="eficha"><b>Numero de ficha</b></label>
                            <input value="<?=$coEdit[0]['codigo']?>" type="number" class="form-control" id="eficha" Placeholder="Ingrese el numero de ficha" name="eficha" required>                                        
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="ecfecha_inicio"><b>Fecha Inicio</b></label>
                            <input type="date"  value="<?=$coEdit[0]['fecha_inicio']?>" class="form-control" id="ecfecha_inicio"  name="ecfecha_inicio"  required>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="ecfecha_fin"><b>Fecha Fin</b></label>
                            <input type="date"  value="<?=$coEdit[0]['fecha_fin']?>" class="form-control" id="ecfecha_fin"  name="ecfecha_fin" required>
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="ecdescripcion"><b>Ingrese descripcion de la convocatoria</b></label>
                            <textarea class="form-control" name="ecdescripcion" id="ecdescripcion" cols="30" rows="8" Placeholder="Ingrese una descripcion" value="" required><?php echo $coEdit[0]['descripcion']?></textarea>
                                                                   
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="ecfoto"><b>Ingrese una imagen de la convocatoria</b></label>
                            <img style="width:3rem;height:3rem;border:black 1px solid;" class="rounded-circle" src="../img/convocatorias/<?=$coEdit[0]['foto']?>"><input type="file" class="form-control" id="ecfoto"  name="ecfoto">                                        
                        </div>
                        <input type="hidden" name="idconv" value="<?=$coEdit[0]['id']?>" readonly>
                    
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block" >Editar</button>
                        </div>
                        <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?cancelEditconv=1" class="btn btn-danger btn-block">Cancelar</a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Datos de convocatoria</h6>
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
                                            <div class="form-group col-md-6">                                         
                                                <label for="nombre"><b>Ingrese el nombre de la convocatoria</b></label>
                                                <input type="text" class="form-control" id="nombre" Placeholder="Ingrese el nombre de la convocatoria" name="nombre" required>                                        
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tipoDeCurso"><b>Tipo de curso</b></label>
                                                <select name="tipoDeCurso" id="tipoDeCurso" class="form-control" required>

                                                    <option value="">Selecciona una opcion</option>
                                                    <?php
                                                        foreach($tipoCurso as $tc){?>
                                                            <option value="<?= $tc['id']?>" required><?=$tc ['tipoCurso']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="ficha"><b>Numero de ficha</b></label>
                                                <input min="1" type="number" class="form-control" id="ficha" Placeholder="Ingrese el numero de ficha" name="ficha" required>                                        
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="id_jornada"><b>Ingrese Jornada </b></label>
                                                <select name="id_jornada" id="id_jornada" class="form-control" >
                                                    <option value="">Selecciona una opcion</option>
                                                    <?php
                                                        foreach($jornada as $j){?>
                                                            <option value="<?= $j ['id']?>" required><?=$j ['nombrejor']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="fecha_inicio"><b>Fecha Inicio</b></label>
                                                <input type="date"  class="form-control" id="fecha_inicio"  name="fecha_inicio" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="fecha_fin"><b>Fecha Fin</b></label>
                                                <input type="date"  class="form-control" id="fecha_fin"  name="fecha_fin" value="" required>
                                            </div>

                                            <div class="form-group col-md-12">                                         
                                                <label for="descripcion"><b>Ingrese descripcion de la convocatoria</b></label>
                                                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" Placeholder="Escribe una descripcion" required></textarea>
                                                <!-- <input type="text" class="form-control" id="descripcion" Placeholder="Ingrese una descripcion" name="descripcion" required>                                         -->
                                            </div>
                                            <div class="form-group col-md-12">                                         
                                                <label for="foto"><b>Ingrese una imagen de la convocatoria</b></label>
                                                <input type="file" class="form-control" id="fotoc"  name="fotoc" required>                                        
                                            </div>
                                            <!-- <div class="form-group col-md-6">                                         
                                                <label for="link"><b>Ingrese link de la convocatoria</b></label>
                                                <input type="text" class="form-control" id="link" Placeholder="Ingrese un link" name="link" required>                                        
                                            </div> -->                                            

                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Registrar Convocatoria</button>
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
                                            <th>Tipo de curso</th>
                                            <th>Ficha</th>
                                            <th>Jornada</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Ver mas</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Tipo de curso</th>
                                            <th>Ficha</th>
                                            <th>Jornada</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Ver mas</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    date_default_timezone_set("America/Bogota");
                                    if(empty($filtroConvocatoria)){
                                        $filtroConvocatoria = false;
                                    }
                                    else{
                                        $i=1;
                                     foreach($filtroConvocatoria As $c){?>
                                        <tr class="<?php if(strtotime($c['fecha_fin'])<strtotime(date('Y-m-d'))){
                                                            echo'tr-vencida';
                                                        }else if(strtotime($c['fecha_fin'])>strtotime(date('Y-m-d'))){
                                                            echo'tr-valida';
                                                        }else if(strtotime($c['fecha_fin'])==strtotime(date('Y-m-d'))){
                                                            echo'tr-pendiente';
                                                        }
                                                            ?>">
                                            <td><?=$i?></td>
                                            <td><?=$c['nombre']?></td>
                                            <td><?=$c['tipoCurso']?></td>
                                            <td><?=$c['codigo']?></td>
                                            <td><?=$c['nombrejor']?></td>
                                            <td><?=$c['fecha_inicio']?></td>
                                            <td><?=$c['fecha_fin']?></td>
                                            <td><?=substr($c['descripcion'],0,90).".."?></td>
                                            <td style="text-align: center ;"><img src="../img/convocatorias/<?=$c['foto']?>" width="150px"> </td>
                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegUser.php?editconv=<?=$c['id']?>" title="Editar">
                                                    <i class="fa fa-edit icono-blanco"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center;">   
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $c['id'] ?>,'<?=$c['nombre']?>');">
                                                    <i class="fa fa-trash icono-blanco"></i>
                                                 </a>
                                            </td>

                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegUser.php?idRegistrados=<?=$c['codigo']?>">
                                                    <i class="bi bi-eye-fill icono-blanco" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <script>
                                        function recibir_id(id,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                         let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                         let href = '../controllers/cRegUser.php?eliminar_conv=' + id;
                                         enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar el registro de "+nombre+" con id de: "+id+" ?";
                                        }
                                        </script>
                                            
                                            <?php $i ++; } }?>
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