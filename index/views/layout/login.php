

<div class="modal modalentorno " id="Login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content fondoModal">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: Amatic SC ;">Iniciar Sesion</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red;"></button>
      </div>
      
      <div class="modal-body">
      
        <form action="../ejercicio/controllers/cuser.php" method="POST">   
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
            <span class="input-group-text" id="basic-addon1" onclick="mostrarContrasena()"><i id="icon" class="bi bi-eye-slash-fill"></i></span>
            <input type="password" id="contra" name="contra" class="form-control modalinput" placeholder="Escribe tu contraseña" aria-label="Escribe tu usuario" aria-describedby="basic-addon1" required>
          </div>
          
          <?php if(isset($_SESSION['mensajeLogin'])): ?>

            <div class="modal-footer botones ">

            </div>

            <div class="alert alert-<?=$_SESSION['tipo_alert_Login']?> alert-dismissible fade show" role="alert">

              <?=$_SESSION['mensajeLogin']?>

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>

            <?php

                unset($_SESSION['tipo_alert_Login']);

                unset($_SESSION['mensajeLogin']);

            ?>

          <?php endif ?> 
          <div class="modal-footer botones">
            <a class="btn btn-danger btn-block boton" data-bs-dismiss="modal">Cerrar</a>
            <button class="btn btn-success btn-block boton">Iniciar sesión</button>
          </div>
          <script>
              function mostrarContrasena(){
                  let tipo = document.getElementById("icon");
                  let contra = document.getElementById("contra");
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
        </form>
      </div>
    </div>
  </div>
</div>
