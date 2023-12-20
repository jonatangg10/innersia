<div class="modal modalentorno" id="Curso" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="font-family: Amatic SC ;">Curso</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red;"></button>
      </div>
      <div class="modal-body">
           <p>Nombre</p><br>
           <p>tipo curso</p><br>
           <p>Tecgnologo</p><br>
           <p>descripcion</p><br>
           <?php foreach($cursoMañana as $M){?>
            <p><?php echo $M['descripcion'];?></p>

           <?php }?>

      </div>
    </div>
  </div>
</div>
