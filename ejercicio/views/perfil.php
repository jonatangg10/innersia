<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
// if ($_SESSION['rol'] != 3) {
//     session_destroy();
//         echo "<script>alert('ERROR Usted no tiene permiso');location.href='../../index/index.php'</script>";
//         exit();
// }
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
    
    <!-- Begin Page Content -->
    <style>
        .fotoperfil{
            width: 220px;
            height: 250px;
            border-radius: 40%;
            cursor: pointer;
        }
    </style>
    
<?php if(isset($_SESSION['x'])){?>
<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Actualizar foto de perfil</h6>
                </div>
                <!-- Card Body -->               
                <div class="card-body">
                    <div class="text-center">
                         <img class="img-circle fotoperfil" src="../img/perfil/<?= $_SESSION['foto']?>" title="Foto de perfil" id="fotoperfil"><hr>
                    </div>
                    <form action="../controllers/cRegActualizarPerfil.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-12">                                          
                                <label for="foto"><b>Foto de Perfil</b></label>
                                <input type="file" class="form-control" id="foto" name="foto">                                  
                            </div> 
                            <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?cancelx=1" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar</button>
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
                        let img = document.getElementById('fotoperfil');
                        let input = document.getElementById('foto');

                        input.onchange = (e) => {
                            if(input.files[0])
                                img.src = URL.createObjectURL(input.files[0]);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>
<?php }elseif(isset($_SESSION['y'])){?>

<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Actualizar información personal</h6>
                </div>
                <!-- Card Body -->
                
               
                <div class="card-body">
                    <form action="../controllers/cRegActualizarPerfil.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">                                         
                                <label for="nombreedit"><b>Nombres</b></label>
                                <input type="text" class="form-control" id="nombreedit" name="nombreedit" value="<?= $_SESSION['nombre']?>" required>                                        
                            </div>

                            <div class="form-group col-md-6">                                         
                                <label for="apellidos"><b>Apellidos</b></label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $_SESSION['apellidos']?>" required>                                        
                            </div>
                            <div class="form-group col-md-4">  
                                <label for="tDoc"><b>Tipo de documento</b></label>
                                <select name="tDoc" id="tDoc" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                        foreach($tDocs as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$_SESSION['tDoc']? 'selected':''; ?> ><?=$td ['nombretd'];
                                            ?></option>
                                    <?php } ?>           
                                </select>
                            </div>
        
                        
                            <div class="form-group col-md-4">  
                                <label for="genero"><b>Género</b></label>
                                <select name="genero" id="genero" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                        foreach($genero as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$_SESSION['genero']? 'selected':''; ?> ><?=$td ['nombregen'];
                                            ?></option>
                                    <?php } ?>           
                                </select>
                            </div>
                            <div class="form-group col-md-4">  
                                <label for="tPoblacion"><b>Tipo de población</b></label>
                                <select name="tPoblacion" id="tPoblacion" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                        foreach($poblacion as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$_SESSION['poblacion']? 'selected':''; ?> ><?=$td ['nombrepob'];
                                            ?></option>
                                    <?php } ?>           
                                </select>
                            </div>

                            <div class="form-group col-md-6">                                         
                                <label for="numcelular"><b>Numero de celular</b></label>
                                <input type="number" min="1" maxlength="10" oninput="maxlengthNumber(this);" class="form-control" id="numcelular" name="numcelular" value="<?= $_SESSION['numerocel']?>" required>
                            </div>

                            <div class="form-group col-md-6">                                         
                                <label for="correo"><b>Correo electronico</b></label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?= $_SESSION['correo']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?cancely=1" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar</button>
                            </div>
                                            
                            <?php if(isset($_SESSION['mensaje2'])): ?>
                            <div class="form-group col-md-12">
                                <div class="alert alert-<?=$_SESSION['tipo_alert2']?> alert-dismoissible fade show" role="alert">
                                    <?=$_SESSION['mensaje2']?>
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

<?php }elseif(isset($_SESSION['z'])){?>
<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Actualizar Contraseña</h6>      
                </div>
                <!-- Card Body -->
                
               
                <div class="card-body">
                    <form action="../controllers/cRegActualizarPerfil.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">                                          
                                <label for="contrasena"><b>Nueva Contraseña</b></label>
                                <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Escribe tu contraseña" required>                                          
                            </div>

                            <div class="form-group col-md-6">                                          
                                <label for="econtrasena"><b>Validar Nueva Contraseña</b></label>
                                <input type="text" class="form-control" id="econtrasena" name="econtrasena" placeholder="Vuelve a escribir tu contraseña" required>                                         
                            </div>
                            <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?cancelz=1" class="btn btn-danger btn-block">Cancelar</a>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-success btn-block">Editar</button>
                            </div>
                                            
                            <?php if(isset($_SESSION['mensaje3'])): ?>
                            <div class="form-group col-md-12">
                                <div class="alert alert-<?=$_SESSION['tipo_alert3']?> alert-dismoissible fade show" role="alert">
                                    <?=$_SESSION['mensaje3']?>
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

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Actualizar información</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                    <div class="row">
                        <div class="form-group col-md-12">                                          
                            <ul>
                                <li><a href="../controllers/cRegUser.php?x">Actualizar foto de perfil</a></li>
                                <li><a href="../controllers/cRegUser.php?y">Actualizar informacion personal</a></li>
                                <li><a href="../controllers/cRegUser.php?z">Actualizar contraseña</a></li>
                            </ul>                                        
                        </div>
                    </div> <!--Cierre del row--> 
                </div>
            </div>
        </div>
    </div>

</div>
<?php }?>
<!-- /.container-fluid -->
<!-- fin editar usuario -->
<?php
    include_once("layout/footer.php");
?>
 <script src="../js/demo/municipio.js"></script>