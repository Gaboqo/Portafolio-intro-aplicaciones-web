<?php

require 'conexion.php';

if (!empty($_POST['username']) && !empty($_POST['email'])){
    enviarCorreo($emai);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/forgot-password.css">
    <script src="https://kit.fontawesome.com/81e97a4bb9.js" crossorigin="anonymous"></script>
    <script src="js/checkValidity.js"></script>
    <title>Olvidó su contraseña</title>
</head>

<body>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header alert-space">
                <div id="cong-alert" class="alert alert-light collapse" role="alert">Se ha enviado un enlace a su correo electrónico de forma exitosa.</div>
            </div>
            <form class="col-12 validate-form" id="val-form" novalidate>
                <h1 class="mb-3">Recuperar contraseña</h1>
                <p>Ingrese el correo electrónico que utiliza en su cuenta. Le enviaremos un enlace para que restablezca su contraseña.</p>
                <div class="form-group">
                    <input type="text" id="loginUsername" name="username" class="form-control form-control-lg" placeholder="Nombre de usuario" required>
                    <div class="invalid-feedback">Por favor ingrese un nombre de usuario válido</div>
                    <div class="valid-feedback">Nombre de usuario válido</div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Correo electrónico" required>
                    <div class="invalid-feedback">Por favor ingrese un correo electrónico válido</div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-light btn-lg btn-block">Enviar &nbsp<i
                            class="fas fa-envelope"></i></button>
                </div>
            </form>
            <div class="modal-footer signin">
                <a href="index.php">Regresar a Inicio de sesión</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>