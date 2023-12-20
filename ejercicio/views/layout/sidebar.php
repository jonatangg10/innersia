
<?php
$roless = array(
    1  => "Instructor",
    2  => "Aprendiz",
    3  => "Coordinador",
    4  => "Administrador"
);
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
?>
 <!-- Page Wrapper -->
    <div id="wrapper">
      
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="bi bi-person-circle"></i>
        </div>
    <div class="sidebar-brand-text mx-3"><?=$roless[$_SESSION['rol']]?></div>
    </a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<?php

$fecha_nacimiento = new DateTime($_SESSION['fechanacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$simple = $edad->y;
$denegado = true;
?>

<?php if(isset($_SESSION['tipodocumento']) && $_SESSION['tipodocumento'] ==1 && $simple>=18 ){
    $denegado = false; }?>
<?php if($denegado == true){ ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../views/menuinstructor.php">
        <i class="fa fa-home"></i>
        <span>Inicio</span></a>
</li>
<?php 
 if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
if(isset( $_SESSION['rol']) && $_SESSION['rol']==3){
?>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../views/registrarcurso.php">
        <i class="fa fa-users"></i>
        <span>Reg. Convocatorias</span></a>
</li>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../views/registrarusuario.php">
        <i class="fa fa-user"></i>
        <span>Reg. Usuario</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="../views/registrardias.php">
    <i class="fa fa-calendar"></i>
        <span>Dias Habiles</span></a>
    </li>
<?php 
}
if(isset( $_SESSION['rol']) && $_SESSION['rol']==1){
?>
<li class="nav-item active">
    <a class="nav-link" href="../views/convocatorias.php">
        <i class="fa fa-user"></i>
        <span>Anunciar convocatorias</span></a>
</li>

<?php 
}
?>
<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==4){ ?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administar"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-file-earmark-person"></i>
        <span><strong>Administrar aplicativo</strong></span>
    </a>
    <div id="administar" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilidades:</h6>
            <a class="collapse-item" href="adminAcercaDeNosotros.php">A cerca de nosotros</a>
            <a class="collapse-item" href="admincomentarios.php">Comentarios</a>
            <a class="collapse-item" href="admincontacto.php">Contacto</a>
            <a class="collapse-item" href="admineventos.php">Eventos</a>
            <a class="collapse-item" href="admingaleria.php">Galeria</a>
        </div>
    </div>
</li>

<?php  } ?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Herramientas
</div>

<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==4){ ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administarCon" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="bi bi-file-earmark-person"></i>
            <span><strong>Reportes</strong></span>
        </a>
    <div id="administarCon" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="reportesComentarios.php">Comentarios</a>
            <a class="collapse-item" href="reportesContacto.php">Contacto</a>
            <a class="collapse-item" href="reportesEventos.php">Eventos</a>    
        </div>
    </div>
</li>
<?php } ?>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="bi bi-layout-text-window-reverse"></i>
        <span><strong>Presentar pruebas de selección</strong></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes:</h6>
            <a class="collapse-item" href="#">Consultar Pruebas</a>
        </div>
    </div>
</li> -->

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-file-earmark-person"></i>
        <span><strong>Certificados</strong></span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilidades:</h6>
            <a class="collapse-item" href="#">Consultar Certificados</a>
            
        </div>
    </div>
</li> -->
<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==3){?>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportes"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-calendar-event"></i>
        <span><strong>Reportes</strong></span>
    </a>
    <div id="reportes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="reportesAprendices.php">Aprendices</a>
            <a class="collapse-item" href="reportesConvocatorias.php">Convocatorias</a>
            <a class="collapse-item" href="reportesComentarios.php">Comentarios</a>
            <a class="collapse-item" href="reportesEventos.php">Eventos</a>
            
            
        </div>
    </div>
</li>
<?php } ?>

<?php
if(isset( $_SESSION['rol']) && $_SESSION['rol']==1 or $_SESSION['rol']==2 or $_SESSION['rol']==3){
    if( $_SESSION['rol']==1){ ?>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notificaropciones"
        aria-expanded="true" aria-controls="notificaropciones">
        <i class="bi bi-file-earmark-person"></i>
        <span><strong>Notificar </strong></span>
    </a>
    <div id="notificaropciones" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">A quien deseas enviar <br> una notificacion:</h6>
            <a class="collapse-item text-warning" href="../controllers/cNotificaciones.php?rolemisor=3">Coordinador</a>
            <a class="collapse-item text-info" href="../controllers/cNotificaciones.php?rolemisor=2">Aprendiz</a>
            <a class="collapse-item text-success" href="../controllers/cNotificaciones.php?rolemisor=1"><b>Otro instructor</b></a>
        </div>
    </div>
</li>

    <?php }elseif( $_SESSION['rol']==3){  ?>
        <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notificaropciones"
        aria-expanded="true" aria-controls="notificaropciones">
        <i class="bi bi-file-earmark-person"></i>
        <span><strong>Notificar </strong></span>
    </a>
    <div id="notificaropciones" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">A quien deseas enviar <br> una notificacion:</h6>
            <a class="collapse-item text-Success" href="../controllers/cNotificaciones.php?rolemisor=2">Aprendiz</a>
            <a class="collapse-item text-Success" href="../controllers/cNotificaciones.php?rolemisor=1">Instructor</a>
        </div>
    </div>
</li>
<?php }} ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Sistema de Ayuda
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-calendar-event"></i>
        <span><strong>Fechas importantes</strong></span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="login.php">Portal</a>
            <a class="collapse-item" href="register.html">Cronograma 2023</a>
            <a class="collapse-item" href="forgot-password.html">Boletín informativo</a>
            <a class="collapse-item" href="register.html">Noticias</a>
            <a class="collapse-item" href="forgot-password.html">Seguridad</a>
        </div>
    </div>
</li> -->


<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==3){ ?>

    <li class="nav-item">
        <a class="nav-link" href="../controllers/basedatos.php">
            <i class="bi bi-journal-text"></i>
            <span>
                <strong>Base de Datos</strong>
            </span>
        </a>
    </li>

<?php } ?>
<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="bi bi-journal-text"></i>
        <span><strong>Guía de inscripción</strong></span></a>
</li> -->

<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==2){?>
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administar"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-file-earmark-person"></i>
        <span><strong>Documentacion</strong></span>
    </a>
    <div id="administar" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Documentacion</h6>
                <a class="collapse-item" target="_blank" href="../controllers/cPdfReporteActa.php?reporteinscritos=1">Carta de Compromiso</a>
        </div>
    </div>
    </li>

<?php }?>

<?php if(isset( $_SESSION['rol']) && $_SESSION['rol']==2){?>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="modal" href="#Opinar">
            <i class="bi bi-card-text"></i>
        <span><strong data-toggle="modal" data-target="#Opinar">Dar Opinion</strong></span></a>
</li>

<?php }?>
<?php }?>

<script>
  let contador = 0;
  function calificar(item){
    
    contador=item.id[0];
    let nombre = item.id.substring(1);

    for(let i=0; i<5 ; i++){
      if(i <contador){
        document.getElementById((i+1)+ nombre).style.color="orange";
      }
      else{
        document.getElementById((i+1)+ nombre).style.color="black";
      }
    }

    if(contador){
      document.getElementById('puntuacionTestimonio').value=contador;

    }
  }
</script>

<div class="modal fade" id="Opinar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Opinion sobre el aplicativo</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?=$_SESSION['nombre']?>, escuchar lo que opinan nuestros usuarios es lo más importante para poder mejorar la aplicación.</p><hr>
                    <form action="../controllers/cRegCurso.php" method="POST">
                        <div class="row">
                        <div class="form-group col-md-12">                                         
                            <label for="comentarioApp"><b>Opinion sobre el aplicativo</b></label>
                            <textarea name="comentarioApp" id="comentarioApp" cols="30" rows="6" maxlength="300" class="form-control" placeholder="Escribe tu opinion" required></textarea>
                        </div>
                        <div class="form-group col-md-12 text-center" >
                            <label class="form-label" for="puntuacionTestimonio"><b>Danos tu puntuacion</b></label><br>
                          <i class="bi bi-star-fill" onclick="calificar(this)" id="1" style="cursor: pointer;"></i>
                          <i class="bi bi-star-fill" onclick="calificar(this)" id="2"  style="cursor: pointer;" ></i>
                          <i class="bi bi-star-fill" onclick="calificar(this)" id="3"  style="cursor: pointer;" ></i>
                          <i class="bi bi-star-fill" onclick="calificar(this)" id="4" style="cursor: pointer;" ></i>
                          <i class="bi bi-star-fill" onclick="calificar(this)" id="5" style="cursor: pointer;" ></i>
                          <input type="hidden" name="puntuacionTestimonio"  id="puntuacionTestimonio" value="">
                        </div>
                        <div class="form-group col-md-6">                                         
                            <a class="btn btn-danger btn-block" type="button" data-dismiss="modal">Cancelar</a>
                        </div>
                        <div class="form-group col-md-6">                                         
                            <button class="btn btn-success btn-block">Opinar</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="bi bi-question-circle"></i>
        <span><strong>Ayuda y soporte</strong></span></a>
</li> -->


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ayuda"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="bi bi-calendar-event"></i>
        <span><strong>Ayuda y soporte</strong></span>
    </a>
    <div id="ayuda" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" target="_blank" href="../../ejercicio/controllers/cManual.php?M=1">Manual de Uso</a>
            <!-- <a class="collapse-item" href="reportesConvocatorias.php">Soporte</a>   -->
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>
<!-- End of Sidebar -->