<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    // Si no está iniciada, la iniciamos
    session_start();
}
?>
<!--Cerrar sesion -->   
    <script type="text/javascript">
        n = 1000
        let id = window.setInterval(function(){
            document.onmousemove = function(){
                n = 1000
            };
            n--;
            
            if (n <= -1) {
                swal({
                    title: "Advertencia!",
                    text: "Su sesion se cerrara por inactividad!",
                    icon: "warning",
                    buttons: false,
                });
                // setTimeout(() => {
                // location.href="../controllers/exit.php"
                // },4000)
                document.onmousemove = function(){
                    location.href="../controllers/exit.php"
                };
            }
        },1200); 
    </script>

    <!-- fin de Cierre automatico de sesion -->

<?php
    $_SESSION["alertas"] = array();         
if(empty($filtroConvocatoria)){
    $filtroConvocatoria = false;
}

else{


if($_SESSION["rol"]==1){
    date_default_timezone_set("America/Bogota");
    foreach($filtroConvocatoria As $c){ 

        if(strtotime($c['fecha_fin'])<strtotime(date('Y-m-d'))){
            $array=array('mensaje'=>'Convocatoria vencida','icono'=>'fas fa-exclamation-triangle text-white','tipo'=>'danger','link'=>'../views/convocatorias.php','fecha'=>$c["fecha_fin"]);
            if (!in_array($array, $_SESSION["alertas"])) {
                $_SESSION["alertas"][]=$array;
              }
        }else if(strtotime($c['fecha_fin'])==strtotime(date('Y-m-d'))){
            $array=array('mensaje'=>'Convocatoria por vencerse','icono'=>'fas fa-exclamation-triangle text-white','tipo'=>'warning','link'=>'../views/convocatorias.php','fecha'=>$c["fecha_fin"]);
            if (!in_array($array, $_SESSION["alertas"])) {
                $_SESSION["alertas"][]=$array;
              }
        }
    }
} 
}                                                  
?>
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?=count($_SESSION["alertas"]);?>+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                CENTRO DE ALERTAS
                                </h6>
                                <?php foreach($_SESSION["alertas"] AS $alertas){ ?>
                                <a class="dropdown-item d-flex align-items-center" href="<?=$alertas["link"]?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-<?=$alertas["tipo"]?>">
                                            <i class="<?=$alertas["icono"]?>"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?=$alertas["fecha"]?></div>
                                        <span class="font-weight-bold"><?=$alertas["mensaje"]?></span>
                                    </div>
                                </a>
                                <?php } ?>
                                
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                            <?php
                            
                            if(!empty($notificaciones)){   
                            ?>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?=count($notificaciones);?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mensajes Emergentes
                                </h6>
                                <?php foreach($notificaciones as $n){ 
                                    $fechaenvio = $n['fechaenvio'];
                                    date_default_timezone_set('America/Bogota');
                                    $fechaactual = date("Y-m-d h:i:s");

                                    $fechaseguen = strtotime($fechaenvio);
                                    $fechaseguac = strtotime($fechaactual);

                                    $segundos = $fechaseguac - $fechaseguen;
                                    $minutos = $segundos / 60;
                                    if($minutos < 60){
                                    $mostrar = substr($minutos, 0,1);
                                    $texto = "$mostrar-minutos";
                                        if($minutos >= 10){
                                            $mostrar = substr($minutos, 0,2);
                                        $texto = "$mostrar-minutos";
                                        }
                                    }
                                    elseif($minutos > 60){
                                        $horas = $minutos / 60;
                                        $mostrar = substr($horas,0,1);
                                        $texto = "$mostrar-horas";
                                    }

                                    $leido = array(
                                        'no leido' => ' status-indicator bg-success',
                                        'leido' => ' status-indicator bg-warning'
                                    );
                                    $tipomensaje = array(
                                        'aviso' => 'bg-success',
                                        'previo' => 'bg-warning',
                                        'urgente' => 'bg-danger'
                                    );

                                    ?>

                                <a class="dropdown-item d-flex align-items-center <?= $tipomensaje[$n['tipomensaje']] ?>" id="mensaje"  data-toggle="modal" data-target="#leermensaje" onclick="idmensaje(<?= $n['id']?>,'<?= $n['nombreemi']?>','<?= $n['apellidoemi']?>','<?= $n['rolemisor']?>',
                                '<?= $n['nombrerece']?>','<?= $n['apellidorece']?>',<?= $n['docureceptor']?>,'<?= $n['mensaje']?>');
                                 mensajeleido(<?= $n['id']?>,'<?= $n['fechaleido']?>');"  href="#">
                                    <div class="dropdown-list-image mr-3 ">
                                        <img class="rounded-circle" src="../img/perfil/<?= $n['foto'] ?>"
                                            alt="...">
                                        <div class="<?= $leido[$n['estado']] ?>" id="estado"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?= $n["titulomensaje"]  ?></div>
                                        <div class=" text-black-700"><?= $n['nombreemi']?> <?= $n['apellidoemi']?> · <?=$texto?></div>
                                    </div>
                                    </a>                                 
                                    <?php }?>
                                                                  
                                <a class="dropdown-item text-center small text-gray-500" data-toggle="modal" data-target="#masmensajes" href="#">Leer más mensajes</a>
                            </div>
                        </li>
                        <script>
                                                      
                            function idmensaje(id,nombreemi,apellidoemi,rolemisor,nombrerece,apellidorece,docureceptor,mensaje){                           
                            let modal = document.getElementById("leermensaje");
                            let borrado = modal.querySelector("#botonconfirmar");
                            let href = "../controllers/cNotificaciones.php?mensajeleido="+id  ;
                            borrado.setAttribute('href', href);

                            let titulo = document.getElementById("titulo");
                            titulo.innerText="Notificacion de "+ nombreemi +" " +apellidoemi + "-" + rolemisor +"";
                            let texto = document.getElementById("texto");
                            texto.innerText="Señor/a " + nombrerece +" "+ apellidorece+", con numero documento " + docureceptor + " le informo que 👇";
                            
                            let textonegrila = document.getElementById("textonegrilla");
                            textonegrila.innerText=""+ mensaje;
                            }
                            
                            function mensajeleido(id,fechaleido){                   
                                let parametro1 = id;
                                let parametro2 = fechaleido;
                                // console.log(parametros);
                                $.ajax({
                                    data: {'id':parametro1,
                                        'fechaleido':parametro2
                                    },
                                    url: 'layout/mensaje.php',
                                    type: 'POST',
                                    beforeSend: function() { },
                                    success:function(response){
                                         console.log(response);
                                        
                                        
                                    }
                                });  
                                                                              
                            }
                        </script>
                        <?php }else{ ?>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mensajes Emergentes
                                </h6>                              
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#"><h6>No hay notificaciones</h6></a>
                            </div>
                        </li>
                        <?php } ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                       
                      <!-- End of Topbar -->


                      <!-- Logout Modal-->

    <div class="modal fade" id="masmensajes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notificaciones pendientes de <br> <?php echo $_SESSION['nombre']?> <?php echo $_SESSION['apellidos']?> </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="textomasmensajes" class="modal-body"><?php echo $_SESSION['nombre']?>, estas son las notificaciones sin abrir</div>
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
    <div class="modal fade" id="leermensaje" tabindex="-1"  aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center"><p id="texto"></p><b id="textonegrilla"></b></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a id="botonconfirmar" class="btn btn-success btn-block" href="#">Mensaje leido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>