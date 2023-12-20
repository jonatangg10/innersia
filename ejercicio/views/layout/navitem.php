<?php

$fecha_nacimiento = new DateTime($_SESSION['fechanacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$simple = $edad->y;
$perfil = "./perfil.php";
?>

<?php if(isset($_SESSION['tipodocumento']) && $_SESSION['tipodocumento'] ==1 && $simple>=18 ){
    $perfil = "#"; }?>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(isset($_SESSION['nombre'] , $_SESSION['apellidos'])): ?>
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nombre']?> <?= $_SESSION['apellidos']?></span>
                                <?php endif ?>
                                <img class="img-profile rounded-circle" src="../img/perfil/<?= $_SESSION['foto']?>">
                            </a>                         
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href=<?=$perfil ?>>
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registro de actividades
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a> -->
                                <a class="dropdown-item" href="../controllers/exit.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                  <!-- Logout Modal-->
