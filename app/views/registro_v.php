<section class="row d-flex justify-content-center mt-5 mb-3">

  <div class="col">
    <div class="d-flex align-items-center">
      <form class="w-75 m-auto" method="post" action="<?php echo BASE_URL; ?>Inicio/insertarUsuario">
        <fieldset class="border border-2 rounded border-dark p-3 bg-warning fw-bold">
          <legend class="text-center">Alta de usuarios:</legend>
          <div class="form-group my-3">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Paco" class="form-control"
              required>
          </div>
          <div class="form-group my-3">
            <label for="dni">Dni: </label>
            <input type="text" id="dni" class="form-control" name="dni" placeholder="00000000A"
              pattern="[0-9]{8}[A-Z]{1}" class="form-control" required>
          </div>
          <div class="form-group my-3">
            <label for="password">Contraseña:</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="contrasena" placeholder="Contraseña"
                class="form-control" required minlength="6" maxlength="14">

              <button id="verClave" type="button" class="input-group-append btn btn-secondary "><svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                  viewBox="0 0 16 16">
                  <path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg></button>

            </div>
          </div>
          <?php if (!isset($_COOKIE['oferta'])) {
            ?>
            <div class="form-group my-3 ">
              <p class="font-weight-bold">Profesores, precios y sus vehiculos:</p>
              <div class="d-flex justify-content-space-evenly flex-wrap">
                <?php echo $contrataciones ?>
              </div>
            </div>
          <?php } else { ?>
            <input type="hidden" id="dni_prof"
              value="<?php echo $prof = isset($_COOKIE['dni_prof']) ? $_COOKIE['dni_prof'] : "" ?>" name="dni_profesor" />
          <?php } ?>
          <input type='hidden' name='rol' value='0'>
          <input type='hidden' name='oferta'
            value='<?php echo $oferta = isset($_COOKIE['oferta']) ? $_COOKIE['oferta'] : 0 ?>'>
          <div class="d-grid gap-2 my-3">
            <input type="submit" class="btn btn-primary btn-block" value="Registrar" id="register_button"></input>
          </div>
        </fieldset>
      </form>
    </div>
    <script>

      $("#register_button").on("click", function (e) {
        <?php if (!isset($_COOKIE['oferta'])) { ?>
          var dniProfValue = $("input[name='dni_profesor']:checked").val();
          if (!dniProfValue) {
            e.preventDefault();
            alert("Debe elegir un profesor");
            return;
          }

        <?php }
        ?>
      });
      $(document).ready(function () {
        $("#verClave").on("click", function (event) {
          if ($("#password").get(0).type == "password") {
            $("#password").get(0).type = "text";
          } else {
            $("#password").get(0).type = "password";
          }
        });

      });
    </script>
</section>
