<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonios</h2>
          <p>Que opinan <span>Sobre nosotros</span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php 
            if(empty($testimonio)){
              $testimonio = false;
              ?>
              <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>SIN COMNENTARIOS PARA MOSTRAR</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            }else{
            foreach($testimonio as $T){?>

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                      <div class="testimonial-content">
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                            <?php echo $T['comentario'];?>
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      <h3><?php echo $T['nombre'];?> <?php echo $T['apellidos'];?></h3>
                      <h4><?php echo $T['nombrerol'];?></h4>
                      <div class="stars">
                        <p>Puntuacion
                          <?php $puntuacion = $T['puntuacion']; 
                          $i = 1;
                          $html = '<i class="bi bi-star-fill"></i>';?>
                          <?php while($i <= $puntuacion): ?>
                        
                          <?php echo $html; ?>
                          <?php $i++; endwhile ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <a class="glightbox" data-gallery="images-perfil-<?php echo $T['foto'];?>" href="../ejercicio/img/perfil/<?php echo $T['foto'];?>">
                      <img src="../ejercicio/img/perfil/<?= $T['foto'];?>" class="img-fluid testimonial-img" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin testimonio -->
            
            <?php }} ?>



          </div>
          <div class="swiper-pagination"></div>
        </div>
    </div>
    <br>
    <!-- <center><a class="opinar" data-bs-toggle="modal" href="#Testimonio">Dar opinion</a></center> -->
</section>

<div class="modal" id="Testimonio" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Opinion sobre el aplicativo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="controllers/controlador.php" method="POST" enctype="multipart/form-data">
           <div class="form-outline mb-4">
              <label class="form-label" for="nombresTestimonio"><b>Nombres</b></label>
              <input type="text" id="nombresTestimonio" name="nombresTestimonio" class="form-control form-control-lg" placeholder="Escribe tus nombres" required/>  
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="apellidosTestimonio"><b>Apellidos</b></label>
              <input type="text" id="apellidosTestimonio" name="apellidosTestimonio" class="form-control form-control-lg" placeholder="Escribe tus apellidos" required/>  
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="ocupacionTestimonio"><b>Ocupacion</b></label>
              <input type="text" id="ocupacionTestimonio" name="ocupacionTestimonio" class="form-control form-control-lg" placeholder="Escribe tu ocupacion" required/>  
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="comentarioTestimonio"><b>Comentario</b></label>
              <textarea class="form-control" name="comentarioTestimonio" id="comentarioTestimonio" cols="30" rows="10" placeholder="Escribe tu comentario sobre el aplicativo" required></textarea> 
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="fotoTestimonio"><b>Foto</b></label>
              <input type="file" id="fotoTestimonio" name="fotoTestimonio" class="form-control form-control-lg" placeholder="Selecciona tu foto" required />  
            </div>
            <div class="modal-footer">
              <a class="btn btn-danger btn-block" data-bs-dismiss="modal">Cerrar</a>
              <button class="btn btn-success btn-block">Guardar opinion</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>