<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoescuela Manjon</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/fonts/bootstrap-icons.css" />
    <script src="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>app/assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <style>
        footer {
            bottom: 0;
            left: 0;
            right: 0;
            position: relative;
            background-color: grey;
            color: white;
        }

        body {
            background-color: #cccccc;
            background-size: cover;
        }

        img {
            max-width: 300px;
            max-height: 250px;
        }
    </style>
</head>
<main class="container mt-3">
    <!-- Contenedor principal -->
    <header class="row align-items-center">
        <!-- Cabecera -->
        <div class="col-2">

            <a href="<?php echo BASE_URL; ?>Inicio/index"><img src="<?php echo BASE_URL; ?>app/assets/img/Logo.png" width="120" alt="" class="img-fluid" /></a>
        </div>
        <div class="col-8">
            <p class="h1 d-flex align-items-baseline justify-content-evenly">Autoescuela Manjon</p>
        </div>
        <div class="col-2">
            <?php
            if (!isset($_SESSION['usuario'])) { ?>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Acceder</button>
            <?php } else { ?>
                <div class="row">
                    <div class="bg-success bg-gradient text-white text-center rounded p-2" min-height="30">
                        <h5>Bienvenido: <?php echo $_SESSION['usuario']['nombre'] ?></h5>
                    </div>

                    <a href="<?php echo BASE_URL; ?>Inicio/logout" class="btn btn-primary id='logout'">LogOut</a>
                </div>

            <?php } ?>
        </div>
        <div class="offcanvas offcanvas-end" name="login_canvas" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Bienvenido a Autoescuela Manjon</h5>
                <button type="button" class="btn-close text-reset " data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-3">
                <form name="formLogin" action="<?php echo BASE_URL; ?>Inicio/comprobarLogin" novalidate method="POST">
                    <fieldset>
                        <legend>Logueate:</legend>
                        <div class="row mb-3">
                            <label for="dni" class="col-sm-3 col-form-label">DNI:</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="dni" name="dni" pattern="[0-9]{8}[A-Z]{1}" required autofocus placeholder="00000000A" />
                                <div class="invalid-feedback">Por favor introduce tu dni</div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="contrasena" class="col-sm-3 col-form-label">Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required minlength="6" />
                                <div class="invalid-feedback">Por favor introduce contraseña</div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" id="btnEnviar" class="btn btn-primary">
                                Enviar
                            </button>
                            <p class="text-center mt-2">¿No estás registrado? <a href="<?php echo BASE_URL; ?>Inicio/registro">Hazlo aquí</a></p>
                        </div>
                    </fieldset>
                </form>
                <script>
                    //Interceptar el submit del formulario
                    $(document.formLogin).on("submit", function(evento) {
                        //Si no esta correctamente validado
                        if (!this.checkValidity()) {
                            //Evito el envio del formulario
                            event.preventDefault();
                        }
                        //Poner al formulario la clase ha sido validado para que nos muestre los feedbacks
                        $(this).addClass("was-validated");
                    });
                </script>
            </div>
        </div>
        <script>

        </script>
    </header>