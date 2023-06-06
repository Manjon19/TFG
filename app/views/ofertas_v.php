<section class="row d-flex justify-content-around mt-5">
  <h3 class="text-center">Ofertas para nuevos usuarios:</h3>
  <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">

    <div class="carousel-inner" style="height:54vh; margin-bottom:20px">
      <!-- Dinamizacion del carrusel para obtener ofertas e imagenes de la bbdd -->
      <?php
      foreach ($Ofertas as $ind => $ofer) {
        if ($ind !== 0) {
          if ($ofer['cod_oferta'] == 1) {
            ?>
            <div class="carousel-item active">
              <input type="hidden" name="cod_oferta" value="<?php echo $ofer['cod_oferta'] ?>">
              <input type="hidden" id="dni_prof" value="<?php echo $ofer['dni_prof'] ?>">
              <img src="<?php echo BASE_URL . "app/assets/img/vehiculos/" . $imagenes[$ind]['ref_img']; ?>"
                class="d-block w-50 h-75 mx-auto img-fluid" alt="" />
              <div
                class="carousel-caption bg-dark text-white mx-auto position-absolute bottom-0 opacity-75 w-50 h-75 d-none d-md-block">
                <h5>
                  <?php echo $ofer['descuento'] ?>% de descuento
                </h5>
                <p>
                  <?php echo $ofer['descripcion'] ?>
                </p>
                <button class="btn btn-success">Obtener oferta</button>
              </div>
            </div>
            <?php
          } else {
            ?>
            <div class="carousel-item">
              <input type="hidden" id="cod_oferta" value="<?php echo $ofer['cod_oferta'] ?>">
              <input type="hidden" id="dni_prof" value="<?php echo $ofer['dni_prof'] ?>">
              <img src="<?php echo BASE_URL . "app/assets/img/vehiculos/" . $imagenes[$ind]['ref_img']; ?>"
                class="d-block w-50 h-75 mx-auto img-fluid" alt="" />
              <div
                class="carousel-caption bg-dark text-white mx-auto position-absolute bottom-0 h-75 opacity-75 w-50 d-none d-md-block">
                <h5>
                  <?php echo $ofer['descuento'] ?>% de descuento
                </h5>
                <p>
                  <?php echo $ofer['descripcion'] ?>
                </p>
                <button class="btn btn-success">Obtener oferta</button>
              </div>

            </div>
          <?php }
        }
      }
      ?>
      <script>
        $("button.btn.btn-success").click(function () {
          document.cookie = "oferta=" + $(".active>input:hidden:first-of-type").val() + ";max-age=3600; path=/";
          document.cookie = "dni_prof=" + $(".active>input:hidden:last-of-type").val() + ";max-age=3600; path=/";
          window.location = "<?php echo BASE_URL . 'Inicio/registro' ?>";
        });
      </script>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon " aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

</section>
