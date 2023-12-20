<section id="gallery" class="gallery section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>galeria</h2>
          <p>Consulta <span>nuestra galería</span></p>
        </div>
        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php foreach($galeria as $ga){?>
              <div class="swiper-slide">
                <a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/<?php echo $ga['foto'];?>">
                  <img src="assets/img/gallery/<?php echo $ga['foto'];?>" class="img-fluid" alt="">
                </a>
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

    </div>
</section>