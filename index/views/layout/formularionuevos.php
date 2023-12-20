<section id="registro" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Registro nuevo usuario</h2>
          <p>¿Aún no estas registrado? <span>¿Que esperas?</span></p>
        </div>
        

        <form action="controllers/cRegNuevosUsuarios.php" method="POST" role="form" enctype="multipart/form-data">
          <div class="row">

            <div class="col-xl-6 form-group">
              <label for="nombre"><b>Nombres</b></label>
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa tus nombre" autocomplete="off" required>
            </div>

            <div class="col-xl-6 form-group">
              <label for="apellidos"><b>Apellidos</b></label>
              <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" autocomplete="off" required>
            </div>
            <div class="col-xl-12 form-group ">
              <label for="tDoc"><b>Tipo de documento</b></label>
              <select name="tDoc" id="tDoc" class="form-control" style="margin-top:2px; margin-bottom: 10px;" required>
                <option value="" selected disabled>Selecciona una opción</option>
                <?php
                  foreach($tDocs as $td){?>
                      <option value="<?= $td ['id']?>" required><?=$td ['nombretd']?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col-xl-6 form-group">
              <label for="nDoc"><b>Número de documento</b></label>
              <input type="number" min="1" maxlength="10" name="nDoc" class="form-control" autocomplete="off" oninput="maxlengthNumber(this);" id="nDoc" placeholder="Ingresa tu número de documento" required>
            </div>

            <div class="col-xl-6 form-group">
              <label for="fechaNacimiento"><b>Fecha de nacimiento</b></label>
              <input type="date"  name="fechaNacimiento" class="form-control" id="fechaNacimiento" autocomplete="off" required>
            </div>
            <div class="col-xl-12 form-group ">
              <label for="genero"><b>Tipo de género</b></label>
              <select name="genero" id="genero" class="form-control" style="margin-top:2px; margin-bottom: 10px;" required>
                <option value="">Selecciona una opción</option>
                <?php
                  foreach($genero as $td){?>
                      <option value="<?= $td ['id']?>" required><?=$td ['nombregen']?></option>
                <?php } ?>
                </select>
            </div>

            <div class="col-xl-6 form-group">
              <label for="genero"><b>Número teléfonico</b></label>
              <input type="number" class="form-control" name="numeroCel" id="numeroCel" min=0 maxlength="10" autocomplete="off" oninput="maxlengthNumber(this);" placeholder="Ingresa tu número de teléfono" required>
            </div>
            <script>
                // Funcion para limitar la cantidad de numeros a escribir
                function maxlengthNumber(obj){
                    if(obj.value.length > obj.maxLength){
                        obj.value = obj.value.slice(0, obj.maxLength);
                    }
                }
            </script>

            <div class="col-xl-6 form-group">
              <label for="correo"><b>Correo electrónico</b></label>
              <input type="email" pattern=".+@gmail\.com" class="form-control" name="correo" autocomplete="off" id="correo" placeholder="Ingresa tu correo electrónico" required>
            </div>

            <div class="col-xl-12 form-group">
              <label for="correo"><b>Tipo de población</b></label>
              <select id="poblacion" name="poblacion" class="form-control" style="margin-top:2px; margin-bottom: 10px;" required>
                <option value="" selected disabled>Selecciona una opción</option>
                  <?php
                    foreach($poblacion as $d){?>
                      <option value="<?= $d['id']?>" required><?=$d['nombrepob'] ?></option>
                  <?php } ?>          
              </select>
            </div>  

            <div class="col-xl-12 form-group">
              <label for="departamento"><b>Departamento de residencia</b></label>
              <select id="departamento" name="departamento" class="form-control" style="margin-top:2px; margin-bottom: 10px;" required>
                <option value="">Selecciona una opción</option>
                  <?php
                    foreach($depar as $d){?>
                      <option value="<?= $d['codigoDepartamento']?>" required><?=$d['nombreDepartamento'] ?></option>
                  <?php } ?>          
              </select>
            </div>

            <div class="col-xl-12 form-group" id="municipioDisplay" style="display: none;">
              <label for="Ciudad"><b>Ciudad o municipio de residencia</b></label>
              <select id="Ciudad" name="Ciudad" class="form-control" style="margin-top:2px; margin-bottom: 10px;" required>
                       
              </select>
            </div>
            

            <div class="col-xl-6 form-group">
              <label for="ArchivoDocu"><b>Documento de Identidad (.pdf)</b></label>
              
              <input type="file" name="ArchivoDocu" class="form-control" id="ArchivoDocu" autocomplete="off" required>
            </div>

            <div class="col-xl-6 form-group">
              <label for="CertificacionDocu"><b>DCertificado de Registraduria Nacional (.pdf)</b></label>
               
              <input type="file" name="CertificacionDocu" class="form-control" id="CertificacionDocu" autocomplete="off"  required>
            </div>
            <div class="section-header">
              <label><b>Su contraseña es los ultimos 4 digitos de numero de documento</b></label>
            </div>

          </div>

          <div class="text-center"><button type="submit">Registrarse</button></div>
          <br><br>
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
        </form>
        <!--End Contact Form -->
        <script>
          // Funcion para limitar la cantidad de numeros a escribir
          function maxlengthNumber(obj){
              if(obj.value.length > obj.maxLength){
                  obj.value = obj.value.slice(0, obj.maxLength);
              }
          }
          </script>
    </div>
</section>

