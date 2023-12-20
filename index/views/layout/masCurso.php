<?php include('views/layout/headercursos.php'); ?>
<section id="menu" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2><?=$_SESSION['cursoinfo'][0]['tipoCurso']; ?></h2>
          <p><span><?=$_SESSION['cursoinfo'][0]['nomcur']; ?></span></p>
        </div>
        
        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background: url(../ejercicio/img/convocatorias/<?=$_SESSION['cursoinfo'][0]['foto']; ?>) no-repeat; background-size: cover;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Contacto instructor</h4>
              <p><?=$_SESSION['cursoinfo'][0]['numerocel']; ?></p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                <b>Lista de detalles:</b>
              </p> 
              <ul>
              <li><i class="bi bi-check2-all"></i> Instructor a cargo: <a style="color: #385C57 ; font-weight: bold;"><?=$_SESSION['cursoinfo'][0]['nombre'];?> <?=$_SESSION['cursoinfo'][0]['apellidos'];?></a></li>
                <li><i class="bi bi-check2-all"></i> Tipo de curso: <a style="color: #385C57 ; font-weight: bold;"><?=$_SESSION['cursoinfo'][0]['tipoCurso']; ?></a></li>
                <li><i class="bi bi-check2-all"></i> Jornada: <a style="color: #385C57 ; font-weight: bold;"><?=$_SESSION['cursoinfo'][0]['nombrejor']; ?></a></li>
                <li><i class="bi bi-check2-all"></i> Fecha de inicio: <a style="color: #385C57 ; font-weight: bold;"><?=fechaATexto($_SESSION['cursoinfo'][0]['fecha_inicio']); ?></a></li>
                <li><i class="bi bi-check2-all"></i> Fecha de fin: <a style="color: #385C57 ; font-weight: bold;"><?=fechaATexto($_SESSION['cursoinfo'][0]['fecha_fin']); ?></a></li>
                <li><i class="bi bi-check2-all"></i> Inscritos: <a style="color: #385C57 ; font-weight: bold;"><?=$_SESSION['cursoinfo'][0]['COUNT(inscritos.convocatorias)']; ?></a></li>
              </ul>
              <div class="position-relative mt-4">
                <img src="assets/img/fotoSegundaria.jpg" class="img-fluid" alt="">
                <a href="https://youtu.be/SJm6I82Msz8" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="call-us position">
          <h2>Descripcion del Curso</h2>
          <p class="fst-italic">
            <?=$_SESSION['cursoinfo'][0]['descripcion']; ?>
          </p>    
        </div>

      </div>
            <div class="container py-5">
            <script>
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>
   <hr>
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
   <div class="section-header">
    <p>Inscribete</p>
    </div>
 
  <!-- Modal tengo usuario -->
  
  <div class="d-grid gap-2 col-6 mx-auto">
    <a type="button" class="btn border border-dark btn-lg" style= "font-family: open sans-serif;"data-bs-toggle="modal" data-bs-target="#tengousu">
      Tengo usuario
    </a>

      <div class="modal fade" id="tengousu" tabindex="-1" aria-labelledby="tengousuLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content fondoModal2">
            <div class="modal-header">
              <h5 class="modal-title" id="tengousuLabel">Registro de usuario con cuenta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <form action="../ejercicio/controllers/cuser2.php" method="POST">
                <div class="input-group mb-3">
                  <label for="documento">Usuario</label>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                  <input type="number" min=1 id="documento" name="documento" class="form-control modalinput" placeholder="Escribe tu usuario" aria-label="Escribe tu usuario" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                  <label for="contra">Contraseña</label>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1" onclick="mostrarContrasena2()"><i id="icon2" class="bi bi-eye-slash-fill"></i></span>
                  <input type="password" id="contras" name="contra" class="form-control modalinput" placeholder="Escribe tu contraseña" aria-label="Escribe tu usuario" aria-describedby="basic-addon1" required>
                </div>
                <script>
                    function mostrarContrasena2(){
                        let tipo = document.getElementById("icon2");
                        let contra = document.getElementById("contras");
                        if(tipo.className == "bi bi-eye-slash-fill"){
                            tipo.className = "bi bi-eye-fill";
                            if(contra.type == "password"){
                              contra.type = "text";
                            }
                        }else{
                            tipo.className = "bi bi-eye-slash-fill";
                            contra.type = "password";
                        }
                    }
                </script>
                <div class="modal-footer botones">
                  <a class="btn btn-danger btn-block boton" data-bs-dismiss="modal">Cerrar</a>
                  <button class="btn btn-success btn-block boton">
                  Registrarse</button>
                  
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    
     
<!-- Modal no tengo usuario -->
  
<a href="registro.php?idRegConvocatoria=<?=$_SESSION['cursoinfo'][0]['codigo']?>" type="button" class="btn text-white btn-lg" style= "background-color: #385C57; font-family: open sans-serif;" >
      No tengo usuario
</a>

                                    
      </div>
   
  
</section>