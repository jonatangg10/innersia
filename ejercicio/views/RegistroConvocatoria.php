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
<?php include_once("../../index/forms/lib_fecha_texto.php"); ?>
       <?php
            include_once("layout/sidebar.php");
       ?>
        
        <?php
     include("./layout/cabecera.php");
?>
<?php
    include("./layout/navitem.php");
    ?>

<?php if(isset($_SESSION['editConvUserOne'])){ ?>
    <?php $coEdit = $_SESSION['editConvUserOne']; ?>
            
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <div class="row">
        
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Editar información de <?=$coEdit[0]['nombre']?> <?=$coEdit[0]['apellidos']?></h6>
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
                <form action="../controllers/cRegEditUser.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">                                         
                            <label for="Nombres"><b>Nombres</b></label>
                            <input type="text" class="form-control" id="Nombres"  name="Nombres" value="<?=$coEdit[0]['nombre']?>">                                        
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="Apellidos"><b>Apellidos</b></label>
                            <input type="text" class="form-control" id="Apellidos"  name="Apellidos" value="<?=$coEdit[0]['apellidos']?>">                                        
                        </div>
                        <div class="form-group col-md-6">  
                                <label for="tDoc"><b>Tipo de documento</b></label>
                                <select name="tDoc" id="tDoc" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($tDocs as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$coEdit[0]['tDoc']? 'selected':''; ?> ><?=$td ['nombretd']; ?></option>
                                    <?php } ?>           
                                </select>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="nDoc"><b>Numero de Documento</b></label>
                            <input type="number" min="0" class="form-control" id="nDoc"  name="nDoc" value="<?=$coEdit[0]['nDocreg']?>">                                        
                        </div>

                        <div class="form-group col-md-3">                                         
                            <label for="nCelular"><b>Numero de Celular</b></label>
                            <input type="number" min="0" class="form-control" id="nCelular"  name="nCelular" value="<?=$coEdit[0]['numerocel']?>">                                        
                        </div>

                        <div class="form-group col-md-3">                                         
                            <label for="correo"><b>Correo</b></label>
                            <input type="email" class="form-control" id="correo"  name="correo" value="<?=$coEdit[0]['correo']?>">                                        
                        </div>

                        <div class="form-group col-md-3">                                         
                            <label for="fechaNacimiento"><b>Fecha de Nacimiento</b></label>
                            <input type="date" class="form-control" id="fechaNacimiento"  name="fechaNacimiento" value="<?=$coEdit[0]['fechanacimiento']?>">                                        
                        </div>
                        <div class="form-group col-md-3">
                            <label for="etpoblacion"><b>Seleccione un Tipo de Poblacion</b></label>
                            <select name="etpoblacion" id="etpoblacion" class="form-control" required>
                                <option value="">Selecciona una opcion</option>
                                <?php
                                    foreach($poblacion as $r){?>
                                        <option value="<?= $r ['id']?>" <?=$r['id']==$coEdit[0]['tpoblacion']? 'selected':''; ?> ><?=$r ['nombrepob']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        

                        <div class="form-group col-md-12">                                         
                            <label for="documentoidentidad"><b>Documento de Identidad (PDF)</b></label>
                            <input type="file" class="form-control" id="documentoidentidad"  name="documento">                                        
                        </div>
                        <div class="form-group col-md-12">                                         
                            <label for="certificado"><b>Certificado de Registraduria Nacional (PDF)</b></label>
                            <input type="file" class="form-control" id="certificado" name="certificado">                                        
                        </div>
                       
                        
                        <input type="hidden" name="idEditarUsuarioConv" value="<?=$coEdit[0]['idp']?>" readonly required>
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block">Editar</button>
                        </div>
                        <div class="form-group col-md-6">
                                <a href="../controllers/cRegUser.php?canceleditarUsuariosConv=1" class="btn btn-danger btn-block">Cancelar</a>
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
    
    <div class="container-fluid">
        
    </div>

<?php } ?>
    <style>
        .pdf {
            background:  linear-gradient(90deg, rgba(244,0,0,1) 0%, rgba(136,12,12,1) 50%, rgba(154,0,0,1) 100%);
            color: white;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .pdf::after,.pdf::before{
            content: "";
            position: absolute;
            opacity: 0,3;
            background:  linear-gradient(90deg, rgba(244,0,0,1) 0%, rgba(136,12,12,1) 50%, rgba(154,0,0,1) 100%)    ;
            border-radius: inherit;
            width: 100%;
            height: 100%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0,3 ease;
        }
        .pdf:hover{
            transform: translate(-12px,-12px);
        }

        .pdf:hover::after{
            transform: translate(6px,6px);
        }
        .pdf:hover::before{
            transform: translate(12px, 12px);
        }


            .excel {
            background: linear-gradient(0deg, rgba(20,159,3,1) 0%, rgba(2,124,3,1) 100%);
            color: white;
            top: 10px;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .excel::after,.excel::before{
            content: "";
            position: absolute;
            opacity: 0,3;
            background: linear-gradient(0deg, rgba(20,159,3,1) 0%, rgba(2,124,3,1) 100%);
            border-radius: inherit;
            width: 98%;
            height: 88%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0,3 ease;
        }
        .excel:hover{
            transform: translate(-12px,-12px);
        }

        .excel:hover::after{
            transform: translate(6px,6px);
        }
        .excel:hover::before{
            transform: translate(12px, 12px);
        }

           .csv {
            background-color: rgb(0, 49, 77);
            color: white;
            top: 10px;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .csv::after,.csv::before{
            content: "";
            position: absolute;
            opacity: 0,3;
            background: rgb(0, 49, 77);
            border-radius: inherit;
            width: 98%;
            height: 88%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0,3 ease;
        }
        .csv:hover{
            transform: translate(-12px,-12px);
        }

        .csv:hover::after{
            transform: translate(6px,6px);
        }
        .csv:hover::before{
            transform: translate(12px, 12px);
        }

        .curricular {
             background: radial-gradient(circle, rgba(79,79,79,1) 0%, rgba(55,55,55,1) 100%);
            color: white;
            top: 10px;
            box-sizing: border-box;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .curricular::after,.curricular::before{
            content: "";
            position: absolute;
            color: white;
            opacity: 0,3;
            background: radial-gradient(circle, rgba(79,79,79,1) 0%, rgba(55,55,55,1) 100%);
            border-radius: inherit;
            width: 98%;
            height: 88%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0,3 ease;
        }
        .curricular:hover{
            transform: translate(-12px,-12px);
        }

        .curricular:hover::after{
            transform: translate(6px,6px);
        }
        .curricular:hover::before{
            transform: translate(12px, 12px);
        }
        
    </style>

         <div class="container-fluid">
<div class="row">

<?php 
    date_default_timezone_set('America/Bogota');
    $fecha = date("Y-m-d"); 
?>
<?php   if($_SESSION['convinfo'][0]['fecha_fin']<$fecha){?>
            <a class="pdf" target="_blank" style=" text-decoration: none;  color:white" href="../controllers/cPdfReporteAsistencias.php?reporteinscritos=1"><i class="bi bi-filetype-pdf" aria-hidden="true"></i>  Generar Reporte Asistencia PDF </a>
<?php }  ?>
    <br>
<?php   if($_SESSION['convinfo'][0]['fecha_fin']<$fecha){?>
            <a class="excel" style=" text-decoration: none;  color:white" href="../controllers/cRegReportesPoblacion.php?poblacion=1"><i class="bi bi-file-earmark-excel" aria-hidden="true"></i>  Generar Reporte de Poblacion CSV </a>
<?php }  ?>
<br>
<?php   if($_SESSION['convinfo'][0]['fecha_fin']<$fecha){?>
            <!-- <a class="excel" style=" text-decoration: none;  color:white" target="_blank" href="../controllers/cRegReportesPoblacionexcel.php?poblacion=1"><i class="bi bi-file-earmark-spreadsheet" aria-hidden="true"></i> Generar Reporte de Poblacion XLSX </a> -->
<?php }  ?>

<?php   if($_SESSION['convinfo'][0]['fecha_fin']<$fecha){?>
            <a class="curricular" style=" text-decoration: none; color:white" href="../controllers/cRegUser.php?EstructuraCurricular=<?=$_SESSION['convinfo'][0]['convocatorias']?>"><i class="bi bi-card-list" aria-hidden="true"></i>  Ir a Estructura Curricular </a> 
<?php }  ?>
            

</div>
    </div>

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registros de Aprendices Inscritos: <?php echo $_SESSION['convinfo'][0]['tipocurso'] ?> en <?php echo $_SESSION['convinfo'][0]['nombrecur'] ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Doc</th>
                        <th>Num Documento</th>
                        <th>Fecha Inscripcion</th>
                        <th>Numero cel</th>
                        <th>Correo</th>
                        <th>Tipo de Poblacion</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Departamento de Residencia</th>
                        <th>Municipio de Residencia</th>
                        <th>Documento de Identidad <a style="color: white;font-weight: bold;">(PDF)</a></th>
                        <th>Certificado de Registraduria Nacional <a style="color: white;font-weight: bold;">(PDF)</a></th>
                        <th>Editar</th>     
                    </tr>
                </thead>
                <tfoot class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Tipo de Doc</th>
                        <th>Num Documento</th>
                        <th>Fecha Inscripcion</th>
                        <th>Numero cel</th>
                        <th>Correo</th>
                        <th>Tipo de Poblacion</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Departamento de Residencia</th>
                        <th>Municipio de Residencia</th>
                        <th>Documento de Identidad <a style="color: white;font-weight: bold;">(PDF)</a></th>
                        <th>Certificado de Registraduria Nacional <a style="color: white;font-weight: bold;">(PDF)</a></th>
                        <th>Editar</th>                       
                    </tr>
                </tfoot>
                <tbody>

                <?php
                date_default_timezone_set("America/Bogota");
                $conv = $_SESSION['convinfo'];
                if(empty($conv)){
                    $conv = false;
                }
                else{
                    $i=1;
                    foreach($conv As $c){?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$c['nombre']?></td>
                        <td><?=$c['apellidos']?></td>
                        <td><?=$c['nombretd']?></td>
                        <td><?=$c['nDocreg']?></td>
                        <td><?=fechaATexto($c['fechareg'])?></td>
                        <td><?=$c['numerocel']?></td>
                        <td><?=$c['correo']?></td>
                        <td><?=$c['nombrepob']?></td>
                        <td><?=fechaATexto($c['fechanacimiento'])?></td>
                        <td><?=$c['nombreDepartamento']?></td>
                        <td><?=$c['nombreCiudad']?></td>
                        <td style="text-align:center;">
                            <a class="nav-link" href="../controllers/cRegUser.php?nDoc=<?=$c['nDocreg']?>&documento=<?=$c['documentoPdf']?>" title="Descargar Documento de Identidad">
                                <i class="fas fa-thumbtack"></i>
                            </a>
                        </td>
                        <td style="text-align:center;">
                            <a class="nav-link" href="../controllers/cRegUser.php?nDoc=<?=$c['nDocreg']?>&certificado=<?=$c['registraduriaDocu']?>" title="Descargar Certificado de Registraduria Nacional">
                                <i class="fas fa-thumbtack"></i>
                            </a>
                        </td>
                        
            
                        <td style="text-align:center;">
                            <a class="nav-link" href="../controllers/cRegUser.php?editarUsuariosConv=<?=$c['id']?>" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                       
                    </tr>
                        
                    <?php
                        $i ++;
                    } }?>
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
<h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
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