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

<?php if(isset($_SESSION['editEstructura'])){ ?>
    <?php $coEdit = $_SESSION['editEstructura']; ?>
            
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Editar información de <?=$coEdit[0]['nombreEs']?></h6>
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
                <form action="../controllers/cRegEditarEstructura.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">                                         
                            <label for="eNombre"><b>Nombres</b></label>
                            <input type="text" class="form-control" id="eNombre"  name="eNombre" value="<?=$coEdit[0]['nombreEs']?>" required>                                        
                        </div>
                        
                        <div class="form-group col-md-6">  
                                <label for="tCom"><b>Tipo de Competencia</b></label>
                                <select name="tCom" id="tCom" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($tEstru as $td){?>
                                            <option value="<?= $td ['id']?>" <?=$td['id']==$coEdit[0]['tCompetencia']? 'selected':''; ?> ><?=$td ['TEnombre']; ?></option>
                                    <?php } ?>           
                                </select>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="rApre"><b>Resultados de Aprendizaje</b></label>
                            <input type="number" min="0" class="form-control" id="rApre"  name="rApre" value="<?=$coEdit[0]['nResultados']?>" required>                                        
                        </div>

                        <div class="form-group col-md-6">                                         
                            <label for="hTotal"><b>Horas Totales</b></label>
                            <input type="number" min="0" class="form-control" id="hTotal"  name="hTotal" value="<?=$coEdit[0]['totalHoras']?>" required>                                        
                        </div>
                        <input type="hidden" name="idEstructura" value="<?=$coEdit[0]['id']?>" readonly>                      
                        <div class="form-group col-md-6">
                            <button class="btn btn-success btn-block">Editar</button>
                        </div>
                        <div class="form-group col-md-6">
                                <a href="../controllers/cRegEstructura.php?cancelar=1" class="btn btn-danger btn-block">Cancelar</a>
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

    <style>
     .gan {
            background: linear-gradient(0deg, rgba(20,159,3,1) 0%, rgba(2,124,3,1) 100%);
            color: white;
            top: 10px;
            box-sizing: border-box;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .gan::after,.gan::before{
            content: "";
            position: absolute;
            color: white;
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
        .gan:hover{
            transform: translate(-12px,-12px);
        }

        .gan:hover::after{
            transform: translate(6px,6px);
        }
        .gan:hover::before{
            transform: translate(12px, 12px);
        }

        .volver {
            background:  radial-gradient(circle, rgba(0,8,46,1) 0%, rgba(5,0,56,1) 100%);
            color: white;
            top: 10px;
            box-sizing: border-box;
            border-radius: 30px;
            margin: 10px 10px;
            padding: 12px 15px;
            transition: transform 0.3s ease;
        }
        .volver::after,.volver::before{
            content: "";
            position: absolute;
            color: white;
            opacity: 0,3;
            background: radial-gradient(circle, rgba(0,8,46,1) 0%, rgba(5,0,56,1) 100%);
            border-radius: inherit;
            width: 98%;
            height: 88%;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: transform 0,3 ease;
        }
        .volver:hover{
            transform: translate(-12px,-12px);
        }

        .volver:hover::after{
            transform: translate(6px,6px);
        }
        .volver:hover::before{
            transform: translate(12px, 12px);
        }
</style>
    
<div class="container-fluid">
<!-- <a href="../controllers/cRegExcel.php">Prueba</a> -->
<!-- Page Heading -->
<?php if(!empty($_SESSION['estructurainfo'] )){?>
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <!-- <h1 class="h3 mb-0 text-gray-800"><p>INNERSIA</p></h1> -->
    <a class="volver" style=" text-decoration: none;  color:white" href="../views/RegistroConvocatoria.php"><i class="bi bi-arrow-left-square" aria-hidden="true"></i> Registros de la convocatoria</a>
    <a class="gan" style=" text-decoration: none;  color:white" href="../controllers/cRegExcel.php?EstructuraCurricularExcel=<?php echo $_SESSION['convinfo'][0]['convocatorias'] ?>"><i class="bi bi-file-earmark-ruled" aria-hidden="true"></i> Generar Diagrama de Gang</a>
</div>
<?php } ?>
    <div class="row">
        
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ingresar Competencia</h6>
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
                <form action="../controllers/cRegEstructura.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">                                         
                            <label for="Nombre"><b>Nombre de la Competencia</b></label>
                            <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="Escribe el Nombre de la Competencia" required>                                        
                        </div>
                        <div class="form-group col-md-6">  
                                <label for="tCompetencia"><b>Tipo de Competencia</b></label>
                                <select name="tCompetencia" id="tCompetencia" class="form-control" required>
                                    <option value="">Selecciona una opcion</option>
                                    <?php
                                        foreach($tEstru as $td){?>
                                            <option value="<?= $td ['id']?>"><?=$td ['TEnombre']; ?></option>
                                    <?php } ?>           
                                </select>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <label for="nResulA"><b>Numero de Resultados de Aprendizaje</b></label>
                            <input type="number" min="1" class="form-control" id="nResulA"  name="nResulA" placeholder="Escribe el numero de Resultado de Aprendizaje" required>                                        
                        </div>

                        <div class="form-group col-md-6">                                         
                            <label for="tHoras"><b>Total de Horas</b></label>
                            <input type="number" min="1" class="form-control" id="tHoras"  name="tHoras" placeholder="Escribe el Total de horas" required>                                        
                        </div>                        
                        <div class="form-group col-md-12">
                            <button class="btn btn-success btn-block">Registrar Competencia</button>
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

<?php } ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Estructura Curricular: <?php echo $_SESSION['convinfo'][0]['tipocurso'] ?> en <?php echo $_SESSION['convinfo'][0]['nombrecur'] ?> con ficha N° <?php echo $_SESSION['convinfo'][0]['convocatorias'] ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombre de la Competencia</th>
                        <th>Tipo de Competencia</th>
                        <th>Resultado de Aprendizaje</th>
                        <th>Horas Totales</th>
                        <th>Editar</th>
                        <th>Eliminar</th>    
                    </tr>
                </thead>
                <tfoot class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nombre de la Competencia</th>
                        <th>Tipo de Competencia</th>
                        <th>Resultado de Aprendizaje</th>
                        <th>Horas Totales</th>
                        <th>Editar</th> 
                        <th>Eliminar</th>                        
                    </tr>
                </tfoot>
                <tbody>

                    <style>
                
                    </style>
                <?php
                $estructura= $_SESSION['estructurainfo'];
                if(empty($estructura)){
                    $estructura = false;
                }
                else{ ?>
                <?php
                    $i=1;
                    foreach($estructura As $c){?>
                    
                    <tr class="<?php if($c['tCompetencia'] ==1){
                                        echo'tr-tecnica';
                                    }else if($c['tCompetencia'] ==2){
                                        echo'tr-basica';
                                    }else if($c['tCompetencia'] == 3){
                                        echo'tr-induccion';
                                    }
                                ?>">
                        <td><?=$i?></td>
                        <td><?=$c['nombreEs']?></td>
                        <td><?=$c['TEnombre']?></td>
                        <td><?=$c['nResultados']?></td>
                        <td><?=$c['totalHoras']?></td>
                        <td style="text-align:center;">
                            <a class="editar" href="../controllers/cRegEstructura.php?editar=<?=$c['id']?>" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td style="text-align:center;">  
                            <a class="editar" href="#"  data-toggle="modal" data-target="#eliminarModal" onclick="recibir_id(<?= $c['id'] ?>,'<?=$c['nombreEs']?>','<?=$c['ficha']?>');">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                       
                    </tr>
                        
                    <?php
                        $i ++;
                    } }?>
                </tbody>
            </table>
            <script>
                function recibir_id(id,nombre,ficha) {
                    let modal = document.getElementById("eliminarModal");
                    let enlaceEjemplo = modal.querySelector("#botonconfirmar");
                    let href = '../controllers/cRegEstructura.php?eliminar=' + id + '&&ficha=' + ficha;
                    enlaceEjemplo.setAttribute('href', href);
                    let texto= document.getElementById("texto");
                    texto.innerText="¿Esta seguro de eliminar la Competencia de "+nombre+"?";
                }
            </script>
        </div>
    </div>
</div>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Eliminar Competencia</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div style="text-align: center;font-weight: bold;" id="texto" class="modal-body">Seleccione "eliminar" si esta seguro de borrar el registro seleccionado</div>
                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a id="botonconfirmar" class="btn btn-success btn-block" href="#">Eliminar</a>
                        </div>
                    </div>
                </div>
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