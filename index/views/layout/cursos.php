<section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Convocatorias</h2>
          <p>Consulta nuestras <span>Convocatorias</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#cursos-Dia">
              <h4>Mañana</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cursos-Tarde">
              <h4>Tarde</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cursos-Noche">
              <h4>Noche</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cursos-Virtual">
              <h4>Virtual</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cursos-Finesdesemana"> <!--Si no da es por el espacio-->
              <h4>Fines de semana</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        <?php $arrayJornadas = ["Dia"=>0,
                          "Tarde"=>0,
                          "Noche"=>0,
                          "Fines de semana"=>0,
                          "Virtual"=>0]; 
        ?>
        <style>
          .container22 {
  position: relative;
  display: flex;
  justify-content: center;
  gap: 50px;
  flex-wrap: wrap;
}
.container22 .card22 {
  position: relative;
}
.container22 .card22 .face {
  width: 300px;
  height: 200px;
  transition: 0.4s;
}
.container22 .card22 .face.front {
  position: relative;
  background: #333;
  display: flex;
  justify-content: center;
  align-content: center;
  align-items: center;
  z-index: 1;
  transform: translateY(100px);
}
.container22 .card22:hover .face.front {
  transform: translateY(0);
  /* box-shadow: inset 0 0 60px whitesmoke, inset 20px 0 80px #f0f,
    inset -20px 0 80px #0ff, inset 20px 0 300px #f0f, inset -20px 0 300px #0ff,
    0 0 50px #fff, -10px 0 80px #f0f, 10px 0 80px #0ff; */
}
/* .container22 .card22:nth-child(2):hover .face.front {
  box-shadow: inset 0 0 60px whitesmoke, inset 20px 0 80px rgb(255, 208, 0),
    inset -20px 0 80px rgb(255, 196, 0), inset 20px 0 300px rgb(255, 182, 46),
    inset -20px 0 300px rgb(255, 153, 0), 0 0 50px #0098be,
    -10px 0 80px rgb(255, 174, 0), 10px 0 80px rgb(0, 162, 255);
}
.container22 .card22:nth-child(3):hover .face.front {
  box-shadow: inset 0 0 60px whitesmoke, inset 20px 0 80px rgb(63, 41, 16),
    inset -20px 0 80px rgb(26, 11, 2), inset 20px 0 300px rgb(24, 19, 5),
    inset -20px 0 300px rgb(53, 27, 13), 0 0 50px #ffca7f,
    -10px 0 80px rgb(70, 45, 8), 10px 0 80px rgb(51, 40, 32);
} */
.container22 .card22 .face.front .content {
  width: 100%;
  height: 100%;
  opacity: 1;
  transition: 0.5s;
  text-align: center;
}
.container22 .card22:hover .face.front .content {
  opacity: 1;
}
.container22 .card22 .face.front .content img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.container22 .card22 .face.front .content i {
  font-size: 3em;
  color: white;
  display: inline-block;
}
.container22 .card22 .face.front .content h3 {
  font-size: 1em;
  color: white;
  text-align: center;
}
.container22 .card22 .face.front .content a {
  transition: 0.5s;
}
.container22 .card22 .face.back {
  position: relative;
  background-color: #ffffff;
  /* background-image: linear-gradient(160deg, #ffffff 0%, #ffdeff 100%); */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  box-sizing: border-box;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
    rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  transform: translateY(-100px);
}
.container22 .card22:hover .face.back {
  transform: translateY(0);
}
.container22 .card22 .face.back .content p {
  font-size: 16px;
  text-align: center;
  margin: 0;
  padding: 0;
  color: #333;
}
.container22 .card22 .face.back 
#bt {
  font-size: 13px;
  margin: 0;
  padding: 0;
  color: #333;
}
.container22 .card22 .face.back .content #bt {
  color: #fff;
  border: 1px solid #fff;
  padding: 10px;
  margin: 15px;
  transition: all 0.3s;
  cursor: pointer;
  font-weight: bold;
  background-color: #385C57;
  border-radius: 6px;
}
.container22 .card22 .face.back .content #bt:hover {
  letter-spacing: 1px;
}
        </style>
        <?php 
        date_default_timezone_set("America/Bogota");
        foreach($jornada AS $J){?>
            <div class="<?=$J['nombrejor']=="Dia"?"tab-pane fade active show":"tab-pane fade-active show"?>" id="cursos-<?=str_ireplace(' ','',$J['nombrejor'])?>">
              <div class="tab-header text-center">
                  <p>Jornada</p>
                  <h3><?php echo $J['nombrejor']?></h3>
              </div>
              <div class="row gy-5">
            <?php
              if(!empty($convocatorias)){
                ?> <div class="container22"> <?php
                foreach($convocatorias AS $C){
                  if($C['nombrejor'] == $J['nombrejor'] && (strtotime($C['fecha_fin'])>=strtotime(date('Y-m-d')))){ 
                    $arrayJornadas[$J['nombrejor']]+=1;?>
                    
                    
                      <div class="card22">
                        <div class="face front">
                          <div class="content">
                            <img src="../ejercicio/img/convocatorias/<?=$C['foto']?>" alt="" />
                          </div>
                        </div>
                        <div class="face back">
                          <div class="content">
                            <p>
                            <?=$C['tipoCurso']?> en <?=$C['nombre']?> en la jornada <?=$C['nombrejor']?>
                            </p>
                            <br>
                            <center><a id="bt" href="controllers/controlador.php?idConvocatoria=<?=$C['id']?>">Saber mas</a></center>
                          </div>
                        </div>
                      </div>       
                 <?php }?>
                 <?php } 
                   ?> </div> <?php
              }
              
                  if($arrayJornadas[$J['nombrejor']] == 0 ){?>
                    <p class="ingredients text-center">No hay cursos disponibles en la jornada <?=$J['nombrejor'] ?></p>
              
                  <?php } 
             
             
             ?>
            </div>
            </div>
            <!-- Fin cursos -->

            <?php } 
            ?>

        </div>
      <!-- Fin Cuadro General -->

        </div>

      </div>
    </section>