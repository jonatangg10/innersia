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
  
<!-- /.container-fluid -->

<!-- fin editar usuario -->




                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registros de formulario de contacto</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Numero celular</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                            <th>Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot class="thead">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>                            
                                            <th>Correo</th>
                                            <th>Numero celular</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    if(!empty($contacto)){  
                                        $i = 1;  
                                        foreach($contacto As $c){?>
                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$c['nombres']?></td>
                                            <td><?=$c['apellidos']?></td>
                                    
                                            <td><?=$c['correo']?></td>     
                                            <td><?=$c['celular']?></td>    
                                            <td><?=$c['asunto']?></td>
                                            <td><?=$c['mensaje']?></td>
                                            <td style="text-align:center;">   
                                                <a class="nav-link" href="#" data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $c['id'] ?>,'<?=$c['nombres']?>');">
                                                    <i class="fa fa-trash"></i>
                                                 </a>
                                            </td>
                                        </tr>
                                        <?php $i++; } }else{
                                            $contacto = false;
                                        } ?>
                             
                                </table>
                                <script>
                                    function recibir_id(id,nombre) {
                                        let modal = document.getElementById("eliminarModal");
                                        let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                                        let href = '../controllers/cRegUser.php?eliminar_contacto=' + id;
                                        enlaceEjemplo.setAttribute('href', href);
                                        let texto= document.getElementById("texto");
                                        texto.innerText="¿Esta seguro de eliminar la solicitud de " + nombre + " ?";
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar solicitud de contacto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="texto" class="modal-body" style="text-align:center;"><b><?php echo $_SESSION['nombre']?></b>, ¿esta seguro de eliminar este registro?</div>
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