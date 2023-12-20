<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contactanos</h2>
          <p>¿Necesitas ayuda? <span>Contactanos</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.592001286635!2d-74.48093638467456!3d5.007220840316306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e409a382b430215%3A0xc52e02a6d349782a!2sSENA%2C%20CDAE%20Villeta!5e0!3m2!1ses!2sco!4v1680589499807!5m2!1ses!2sco" frameborder="0" allowfullscreen></iframe>      
        </div><!-- End Google Maps -->

        
        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Nuestra dirección</h3>
                <p>Cl. 2 #13 - 3, Villeta, Cundinamarca</p>
              </div>
            </div>
          </div><!-- End Info Item -->
          
          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-alarm flex-shrink-0"></i>
              <div>
                <h3>Horario de atencion</h3>
                <div><strong>Lunes-Sabados:</strong> 08 AM - 05 PM;
                  <strong>Domingo:</strong> Cerrado
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->


          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Nuestro correo electronico</h3>
                <p>contact@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-journal-text flex-shrink-0"></i>
              <div>
                <h3>Manual de uso INNERSIA</h3>
                <a href="controllers/controlador.php?M=1">Saber mas</a>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <!-- oninvalid="this.setCustomValidity('Ingresa tus apellidos')"  -->

        <form action="controllers/controlador.php" method="POST" role="form">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa tus nombres"  required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingresa tu correo electronico" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="number" class="form-control" min="1" maxlength="10" oninput="maxlengthNumber(this);"  name="celular" id="celular" min=0 placeholder="Ingresa tu celular" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" maxlength="40" name="asunto" id="asunto" placeholder="Ingresa el asunto" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="mensaje" rows="5" placeholder="Ingresa tu mensaje" required></textarea>
          </div>


          <div class="text-center"><button type="submit">Enviar mensaje</button></div>
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