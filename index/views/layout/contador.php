<section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
            <?php
            foreach($contarAprendices as $A){ ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $A['COUNT(id)']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <?php } ?>
              <p>Estudiantes</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
            <?php
            foreach($contarCursos as $C){ ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $C['COUNT(id)']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <?php } ?>
              <p>Convocatorias</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
            <?php
            foreach($contarInstructores as $I){ ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $I['COUNT(id)']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <?php } ?>
              <p>Instructores</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
            <?php
            foreach($contarJornadas as $J){ ?>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $J['COUNT(id)']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <?php } ?>
              <p>Jornadas</p>
            </div>
          </div>

    </div>
</section>