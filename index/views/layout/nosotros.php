<section id="about" class="about">
    <div class="container" data-aos="fade-up">

    <?php foreach($nosotros as $N){ ?>

        <div class="section-header">
          <h2>Sobre nosotros</h2>
          <p>Aprenda más <span>Acerca de nosotros</span></p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/<?php echo $N['fotoPrincipal'] ?>) ;" data-aos="fade-up" data-aos-delay="150">
            <!-- <div class="call-us position-absolute"> -->
              <!-- <h4>Inscribete en un curso</h4> -->
              <!-- <p>+57 314 297 5647</p> -->
            <!-- </div> -->
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                <?php echo $N['primerTexto'] ?>
              </p>
              <!-- <ul>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul> -->
              <p>
                <?php echo $N['segundoTexto'] ?>
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/<?php echo $N['fotoSegundaria'] ?>" class="img-fluid" alt="">
                <a href="<?php echo $N['linkVideo'] ?>" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
</section>