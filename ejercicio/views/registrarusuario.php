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
    <?php if(isset($_SESSION['userOne'])){ ?>
    <?php $usEdit = $_SESSION['userOne']; $muni=$_SESSION['muni'];?>
            
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
                </div>
                <!-- Card Body -->
               

                <div class="card-body">
                    <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">                                         
                                <label for="enombre"><b>Nombres</b></label>
                                <input type="text" class="form-control" id="enombre" name="enombre" value="<?=$usEdit[0]['nombre']?>" required>                                        
                            </div>

                            <div class="form-group col-md-6">                                         
                                <label for="eapellidos"><b>Apellidos</b></label>
                                <input type="text" class="form-control" id="eapellidos" name="eapellidos" value="<?=$usEdit[0]['apellidos']?>" required>                                        
                            </div>
                            <div class="form-group col-md-6">  
                                <label for="etDoc"><b>Tipo de documento</b></label>
                                <select name="etDoc" id="etDoc" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($tDocs as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$usEdit[0]['tDoc']? 'selected':''; ?> ><?=$td ['nombretd']; ?></option>
                                    <?php } ?>           
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">                                         
                                <label for="enDoc"><b>Numero de documento</b></label>
                                <input type="number" min="0" class="form-control" id="enDoc" name="enDoc" value="<?=$usEdit[0]['nDoc']?>" readonly required>
                            </div>
                            <div class="form-group col-md-3">  
                                <label for="egenero"><b>Genero</b></label>
                                <select name="egenero" id="egenero" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($genero as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$usEdit[0]['genero']? 'selected':''; ?> ><?=$td ['nombregen']; ?></option>
                                    <?php } ?>           
                                </select>
                            </div>
                            <div class="form-group col-md-3">                                         
                                <label for="enumcelular"><b>Numero de celular</b></label>
                                <input type="number" min="0" class="form-control" id="enumcelular" name="enumcelular" value="<?=$usEdit[0]['numerocel']?>" required>
                            </div>

                            <div class="form-group col-md-3">                                         
                                <label for="ecorreo"><b>Correo electronico</b></label>
                                <input type="email" class="form-control" id="ecorreo" name="ecorreo" value="<?=$usEdit[0]['correo']?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="etpoblacion"><b>Seleccione un Tipo de Poblacion</b></label>
                                <select name="etpoblacion" id="etpoblacion" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                        foreach($poblacion as $r){?>
                                            <option value="<?= $r ['id']?>" <?=$r['id']==$usEdit[0]['tpoblacion']? 'selected':''; ?> ><?=$r ['nombrepob']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="erol"><b>Rol</b></label>
                                <select name="erol" id="erol" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                        foreach($roles as $r){?>
                                            <option value="<?= $r ['id']?>" <?=$r['id']==$usEdit[0]['rol']? 'selected':''; ?> ><?=$r ['nombrerol']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">                                          
                                <label for="econtrasena"><b>Contraseña</b></label>
                                <input type="text" class="form-control" id="econtrasena" name="econtrasena">                                         
                            </div>
                            <!-- <div class="form-group col-md-12">                                          
                                <h4>Lugar de nacimiento</h4> 
                            </div> -->
                            <div class="form-group col-md-6">                                          
                                <label for="departamento"><b>Departamento</b></label>
                                    <select class="form-control" id="departamento" name="departamento" required>
                                        <option>Selecciona una opción</option>
                                        <?php
                                            foreach($depar as $d){?>
                                                <option value="<?= $d['codigoDepartamento']?>" <?=$d['codigoDepartamento']==$usEdit[0]['id_depa']? 'selected':''?> required><?=$d['nombreDepartamento'] ?></option>
                                            <?php } ?>
                                    </select>                                         
                            </div>
                            <div class="form-group col-md-6">                                          
                                <label for="Ciudad"><b>Ciudad</b></label>
                                    <select class="form-control" id="Ciudad" name="Ciudad" required>
                                        <?php
                                            foreach($muni as $m){?>
                                                <option value="<?= $m['codigoCiudad']?>" <?=$m['codigoCiudad']==$usEdit[0]['id_muni']?'selected':''?> required><?=$m['nombreCiudad'] ?></option>
                                            <?php } ?>
                                    </select>                                         
                            </div>
                            <div class="form-group col-md-6">                                         
                                <label for="edocumento"><b>Archivo del Documento de Identidad ( <b style="color: red;">PDF</b> )</b></label>
                                <input type="file" class="form-control" id="edocumento"  name="edocumento" >
                            </div>
                            <div class="form-group col-md-6">                                         
                                <label for="ecertificado"><b>Certificacion del Documento de Identidad Registraduria ( <b style="color: red;">PDF</b> )</b></label>
                                <input type="file" class="form-control" id="ecertificado"  name="ecertificado">
                            </div>

                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar</button>
                            </div>

                            <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?cancelEdit=1" class="btn btn-danger btn-block">Cancelar</a>
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
<!--inicio carga masiva --->
<?php 
    }else if(isset($_GET["cargamasiva"])){      
?>
<div class="container-fluid">

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Editar informacion del usuario</h6>
            </div>
            <!-- Card Body -->
           

            <div class="card-body">
                <form action="../controllers/cRegUser.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">                                          
                            <label for="filecsv">Ingrese ARCHIVO CSV</label>
                            <input type="file" class="form-control" id="filecsv" name="excel" id="excel" required>   
                            <input type=hidden value="upload" name=action>                                      
                        </div>

                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block">Cargar</button>
                        </div>

                        <div class="form-group col-md-6">
                            <a href="../controllers/cRegUser.php?cancelarcsv=cancelar" class="btn btn-danger btn-block">Cancelar</a>
                        </div>
                        <div class="form-group col-md-12">
                            <a  onclick="carga()" class="btn btn-info btn-block">Descargar Plantilla</a>
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
                                        
    <script>
        function carga() {
            // alert('hola');
            swal({
                title: "¿Desea hacer una carga masiva?",
                text: "Para realizar una carga masiva, porfavor leer la hoja 1 donde se encuentran las indicaciones para el correcto uso.\n En la hoja 2 iran los datos de los usuarios a registrar.",
                icon: "info",
                buttons: true,
                dangerMode: false,
                buttons: ["Cancelar", "Descargar plantilla"],
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("La plantilla de carga masiva se descargo correctamente", {
                        icon: "success",
                        button:{
                    text: 'Aceptar',
                    },
                });
                location.href="../controllers/cRegUser.php?plantilla=1";
                } 
            })
        }
    </script>
                    </div> <!--Cierre del row-->
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!--//fin carga masiva -->
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
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar usuario</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="../controllers/cRegUsuarios.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">                                         
                                                <label for="nombre"><b>Ingrese nombres</b></label>
                                                <input type="text" class="form-control" id="nombre" Placeholder="Ingrese sus nombres" name="nombre" required>                                        
                                            </div>

                                            <div class="form-group col-md-6">                                         
                                                <label for="apellidos"><b>Ingrese apellidos</b></label>
                                                <input type="text" class="form-control" id="apellidos" Placeholder="Ingrese sus apellidos" name="apellidos" required>                                        
                                            </div>
                                            <div class="form-group col-md-3">  
                                                <label for="tDoc"><b>Tipo de documento</b></label>
                                                <select name="tDoc" id="tDoc" class="form-control">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($tDocs as $td){?>
                                                            <option value="<?= $td ['id']?>" required><?=$td ['nombretd']?></option>
                                                    <?php } ?>           
                                                </select>
                                            </div>
                        
                                            <div class="form-group col-md-3">                                         
                                                <label for="nDoc"><b>Numero de documento</b></label>
                                                <input type="number" min="1" class="form-control"  maxlength="10" oninput="maxlengthNumber(this);" id="nDoc" Placeholder="Ingrese numero de documento " name="nDoc" value="" required>
                                            </div>
                                            <div class="form-group col-md-3">                                         
                                                <label for="fechaNacimiento"><b>Fecha de nacimiento</b></label>
                                                <input type="date" class="form-control" id="fechaNacimiento" Placeholder="Ingrese numero de documento " name="fechaNacimiento" required>
                                            </div>
                                            <div class="form-group col-md-3">  
                                                <label for="genero"><b>Genero</b></label>
                                                <select name="genero" id="genero" class="form-control">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($genero as $td){?>
                                                            <option value="<?= $td ['id']?>" required><?=$td ['nombregen']?></option>
                                                    <?php } ?>           
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="ArchivoDocu"><b>Archivo del Documento de Identidad ( <b style="color: red;">PDF</b> )</b></label>
                                                <input type="file" class="form-control" id="ArchivoDocu"  name="ArchivoDocu" required>
                                            </div>
                                            <div class="form-group col-md-6">                                         
                                                <label for="CertificacionDocu"><b>Certificacion del Documento de Identidad Registraduria ( <b style="color: red;">PDF</b> )</b></label>
                                                <input type="file" class="form-control" id="CertificacionDocu"  name="CertificacionDocu" required>
                                            </div>
                                            <div class="form-group col-md-3">                                         
                                                <label for="numeroCel"><b>Numero de celular</b></label>
                                                <input type="number" min="1" maxlength="10" oninput="maxlengthNumber(this);" class="form-control" id="numeroCel" Placeholder="Ingrese numero de celular" name="numeroCel" value="" required>
                                            </div>
                                            <script>
                                                // Funcion para limitar la cantidad de numeros a escribir
                                                function maxlengthNumber(obj){
                                                    if(obj.value.length > obj.maxLength){
                                                        obj.value = obj.value.slice(0, obj.maxLength);
                                                    }
                                                }
                                            </script>
                                            <div class="form-group col-md-3">                                         
                                                <label for="correo"><b>Correo electronico</b></label>
                                                <input type="email" class="form-control" id="correo" Placeholder="Ingrese correo electronico" name="correo" value="" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="rol"><b>Seleccione un rol</b></label>
                                                <select name="rol" id="rol" class="form-control">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($roles as $r){?>
                                                            <option value="<?= $r ['id']?>" required><?=$r ['nombrerol']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="tPobla"><b>Seleccione un tipo de Población</b></label>
                                                <select name="tPobla" id="tPobla" class="form-control">
                                                    <option value="">Selecciona una opción</option>
                                                    <?php
                                                        foreach($poblacion as $r){?>
                                                            <option value="<?= $r ['id']?>" required><?=$r ['nombrepob']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
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
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-success btn-block" >Registrarse</button>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <input type="reset" class="btn btn-danger btn-block">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <a class="btn btn-info btn-block" href="../views/registrarusuario.php?cargamasiva='true'" >Carga masiva</a> 
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
                            <h6 class="m-0 font-weight-bold text-primary">Usuarios registrados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Tipo Doc</th>
                                            <th>Num Doc</th>
                                            <th>Genero</th>
                                            <th>Tipo de población</th>
                                            <th>Num Telefonico</th>
                                            <th>Correo electronico</th>
                                            <th>Rol</th>      
                                            <th>Ciudad</th>
                                            <th>Departamento</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Tipo Doc</th>
                                            <th>Num Doc</th>
                                            <th>Genero</th>
                                            <th>Tipo de población</th>
                                            <th>Num Telefonico</th>
                                            <th>Correo electronico</th>
                                            <th>Rol</th>
                                            <th>Ciudad</th>
                                            <th>Departamento</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php 
                                    $i = 1;
                                    foreach($user As $u){?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$u['nombre']?></td>
                                            <td><?=$u['apellidos']?></td>
                                            <td><?=$u['nombretd']?></td>
                                            <td><?=$u['nDoc']?></td>
                                            <td><?=$u['nombregen']?></td>
                                            <td><?=$u['nombrepob']?></td>
                                            <td><?=$u['numerocel']?></td>
                                            <td><?=$u['correo']?></td>
                                            <td><?=$u['nombrerol']?></td>
                                            <td><?=$u['nombreCiudad']?></td>
                                            <td><?=$u['nombreDepartamento']?></td>
                                            <td style="text-align:center;">
                                                <a class="nav-link" href="../controllers/cRegUser.php?editUser=<?=$u['id']?>&depar=<?=$u['id_depa']?>" title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center;">   
                                                <!-- <a class="nav-link" href="../controllers/cRegUser.php?eliminar_id=<?= $u['id'] ?>" title="Eliminar">
                                                    <i class="fa fa-trash"></i>
                                                </a> -->
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $u['id'] ?>,'<?=$u['nombre']?>');">
                                                    <i class="fa fa-trash"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                            <?php $i++;} ?>
                                    </tbody>
                                </table>
                                <script>
                                        function recibir_id(id,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                         let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                         let href = '../controllers/cRegUser.php?eliminar_id=' + id;
                                         enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar el registro de "+nombre+" con id de: "+id+" ?";
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
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="texto" class="modal-body">Seleccione "eliminar" si esta seguro de borrar el registro seleccionado</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a id="botonconfirmar" class="btn btn-primary" href="#">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

   
<?php
    include_once("layout/footer.php");
?>
 <script src="../js/demo/municipio.js"></script>