<section class="row d-flex justify-content-around mt-5" style="height:61vh; margin-bottom:20px">

  <h1 class="col-5">
    Autoescuela Manjon: Vienes por el precio y te quedas por nuestro esmero.
  </h1>
  <div class="col-5 w-400"><img src="<?php echo BASE_URL; ?>app/assets/img/coche_index.png" alt="" class="img-fluid" />
  </div>
  <?php
  if (isset($msg)) {
    ?>
    <div class="row d-flex justify-content-center mt-2">
      <div class="col">
        <div class="alert alert-danger" role="alert">
          <strong id="errorLogin">
            <?php echo $msg; ?>
          </strong>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</section>
