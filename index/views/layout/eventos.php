<section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Eventos</h2>
          <p>Informate sobre <span>Nuestros proximos eventos </span> En el centro de formacion</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <?php foreach($eventos as $ev){?>
              <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/img/eventos/<?php echo $ev['foto'];?>)">
                <h3><?php echo $ev['nombre'];?></h3>
                <div class="price align-self-start"><?php echo fechaATexto($ev['fecha']);?></div>
                <p class="description">
                  <?php echo $ev['descripcion'];?>
              </div>
            <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

    </div>
</section>