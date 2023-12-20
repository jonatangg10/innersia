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
include("../controllers/cRegCurso.php");
?>
<?php include_once("../../index/forms/lib_fecha_texto.php"); ?>
       <?php
            include_once("layout/sidebar.php");
       ?>
        
        <?php
     include("./layout/cabecera.php");
?>

                              <!-- End of Topbar -->

    <!-- editar curso-->
    <?php
    include("./layout/navitem.php");

    if(isset($_SESSION['cursoOne'])){
     $cuEdit = $_SESSION['cursoOne']; ?>

     <!-- Begin Page Content -->
     <div class="container-fluid">

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Editar informacion de la convocatoria <?=$cuEdit[0]['tipoCurso']?> en <?=$cuEdit[0]['nombre']?></h6>
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
                <form action="../controllers/cRegCurso.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="enomCurso"><b>Nombre del curso</b></label>
                            <input type="text" value="<?=$cuEdit[0]['nombre']?>" min="0" class="form-control" id="enomCurso" name="enomCurso" required>              
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipoDeCurso"><b>Tipo de curso</b></label>
                            <select name="etipoDeCurso" id="etipoDeCurso" class="form-control" required>

                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($tipoCurso as $tc){?>
                                        <option value="<?= $tc['id']?>" <?=$tc['id']==$cuEdit[0]['tCurso']? 'selected':''; ?> required><?=$tc ['tipoCurso']?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
    
                        <div class="form-group col-md-6">                                         
                            <label for="eFicha"><b>Numero de ficha</b></label>
                            <input type="number" value="<?=$cuEdit[0]['codigo']?>" min="0" class="form-control" id="eFicha" name="eFicha" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ejornada"><b>Jornada</b></label>
                            <select name="ejornada" id="ejornada" class="form-control" required>

                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($jornada as $j){?>
                                        <option value="<?= $j['id']?>" <?=$j['id']==$cuEdit[0]['id_jornada']? 'selected':''; ?> required><?=$j ['nombrejor']?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="einstructor"><b>Instructor Responsable</b></label>
                            <select name="einstructor" id="einstructor" class="form-control" required>

                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($instructores as $j){?>
                                        <option value="<?= $j['nDoc']?>" <?=$j['nDoc']==$cuEdit[0]['nDoc_responsable']? 'selected':''; ?> required><?=$j ['nombre']?> <?=$j ['apellidos']?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">                                         
                            <label for="efechainicio"><b>Fecha Inicio</b></label>
                            <input type="date" class="form-control" id="efechainicio" name="efechainicio" value="<?=$cuEdit[0]['fecha_inicio']?>" required>
                        </div>
                        <div class="form-group col-md-4">                                         
                            <label for="efechafin"><b>Fecha Fin</b></label>
                            <input type="date" class="form-control" id="efechafin" name="efechafin" value="<?=$cuEdit[0]['fecha_fin']?>" required>
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="edescripcion"><b>Ingrese descripcion de la convocatoria</b></label>
                            <textarea name="edescripcion" id="edescripcion" cols="30" rows="5" class="form-control" Placeholder="Escribe una descripcion" required><?=$cuEdit[0]['descripcion']?></textarea>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="ecfoto"><b>Ingrese una imagen de la convocatoria</b></label>
                            <input type="file" class="form-control" id="efoto"  name="efoto">                                        
                        </div>
                        <div class="form-group col-md-6">  
                            <!-- <label for="ecfoto"><b>Imagen de la convocatoria ACTUAL</b></label>                                        -->
                            <center><img id="fotoconvocatoria" style="width:200px;height:150px;border-radius:20%;cursor:pointer;"  src="../img/convocatorias/<?=$cuEdit[0]['foto']?>"></center>                                      
                        </div>
                        <script>
                            let img = document.getElementById('fotoconvocatoria');
                            let input = document.getElementById('efoto');
                            input.onchange = (e) => {
                                if(input.files[0])
                                    img.src = URL.createObjectURL(input.files[0]);
                            }
                        </script>
                        <div class="form-group col-md-12">
                            <button class="btn btn-success btn-block">Editar</button>
                        </div>

                        <div class="form-group col-md-12">
                                <a href="../controllers/cRegCurso.php?cancelEditcur=1" class="btn btn-danger btn-block">Cancelar</a>
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
     <?php 
    }else{
     ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nueva convocatoria</h6>
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
                                    <form action="../controllers/cRegCurso.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nomCurso"><b>Nombre de la convocatoria</b></label>
                                                <input type="text" min="0" class="form-control" id="nomCurso" name="nomCurso" placeholder="Ingrese el nombre de la convocatoria" required>              
                                                </select>
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
                                                <label for="numCurso"><b>Numero de ficha</b></label>
                                                <input type="number" min="0" class="form-control" id="numCurso" name="numCurso" placeholder="Ingrese el numero de ficha" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="jornada"><b>Jornada</b></label>
                                                <select name="jornada" id="jornada" class="form-control" required>

                                                    <option value="">Selecciona una opcion</option>
                                                    <?php
                                                        foreach($jornada as $j){?>
                                                            <option value="<?= $j['id']?>" required><?=$j ['nombrejor']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="instructor"><b>Instructor Responsable</b></label>
                                                <select name="instructor" id="instructor" class="form-control" required>

                                                    <option value="">Selecciona una opcion</option>
                                                    <?php
                                                        foreach($instructores as $j){?>
                                                            <option value="<?= $j['nDoc']?>" required><?=$j ['nombre']?> <?=$j ['apellidos']?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">                                         
                                                <label for="fechainicio"><b>Fecha Inicio</b></label>
                                                <input type="date" class="form-control" id="fechainicio" name="fechainicio" required>
                                            </div>
                                            <div class="form-group col-md-4">                                         
                                                <label for="fechafin"><b>Fecha Fin</b></label>
                                                <input type="date" class="form-control" id="fechafin" name="fechafin" required>
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
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block">Registrar</button>
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
    <?php 
    }
     ?>
                  
                            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cursos registrados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCursos" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Tipo de curso</th>
                                            <th>Num Ficha</th>
                                            <th>Jornada</th>
                                            <th>Responsable</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
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
                                            <th>Tipo de curso</th>
                                            <th>Num Ficha</th>
                                            <th>Jornada</th>
                                            <th>Responsable</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Descripcion</th>
                                            <th>Foto</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                
                                            <?php 
                                            $i = 1;
                                            foreach($curso As $cur){?>
                                                <tr class="<?php if(strtotime($cur['fecha_fin'])<strtotime(date('Y-m-d'))){
                                                            echo'tr-vencida';
                                                        }else if(strtotime($cur['fecha_fin'])>strtotime(date('Y-m-d'))){
                                                            echo'tr-valida';
                                                        }else if(strtotime($cur['fecha_fin'])==strtotime(date('Y-m-d'))){
                                                            echo'tr-pendiente';
                                                        }
                                                            ?>">
                                                    <td><?=$i?></td>
                                                    <td><?=$cur['nombre']?></td>
                                                    <td><?=$cur['tipoCurso']?></td>
                                                    <td><?=$cur['codigo']?></td>
                                                    <td><?=$cur['nombrejor']?></td>
                                                    <td><?=$cur['nomins']?> <?=$cur['apeins']?></td>
                                                    <td><?=fechaATexto($cur['fecha_inicio'])?></td>
                                                    <td><?=fechaATexto($cur['fecha_fin'])?></td>
                                                    <td><?=substr($cur['descripcion'],0,90).".."?></td>
                                                    <td><img src="../img/convocatorias/<?=$cur['foto']?>" alt="" width="150px"></td>
                                                    <td style="text-align:center;">
                                                        <a class="nav-link" href="../controllers/cRegCurso.php?ediCurso=<?=$cur['id']?>" title="Editar">
                                                            <i style="color:white;" class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td style="text-align:center;">   
                                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $cur['id'] ?>,<?= $cur['codigo'] ?>,'<?=$cur['tipoCurso']?>','<?=$cur['nombre']?>');">
                                                            <i style="color:white;" class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            
                                            <?php $i++; } ?>
                                    </tbody>
                                </table>
                                <script>
                                        function recibir_id(id,codigo,tipoCurso,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                         let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                         let href = '../controllers/cRegCurso.php?eliminar_id=' + id;
                                         enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar la convocatoria " + tipoCurso + " en " + nombre + " con ficha " + codigo + " ?";
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
     <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="texto" style="text-align: center;" class="modal-body">
                    <?php echo $_SESSION['nombre']?>, ¿esta seguro de eliminar este registro?
                </div>
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