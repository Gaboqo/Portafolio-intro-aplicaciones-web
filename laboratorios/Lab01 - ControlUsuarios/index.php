<?php

session_start();

require 'conexion.php';

$message;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    if(validarUsuario($_POST['username'], $_POST['password'])){
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        $message = "Nombre de usuario o contraseña incorrecto";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/sign-in.css">
    <script src="https://kit.fontawesome.com/81e97a4bb9.js" crossorigin="anonymous"></script>
    <script src="js/checkValidity.js"></script>
    <title>Ingresar</title>
</head>

<body>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="img-user">
                <img src="img/user.png" alt="">
            </div>

            <?php if (!empty($message)) : ?>
                <div class="modal-header alert-space">
                    <div id="cong-alert" class="alert alert-light" role="alert"><?= $message ?></div>
                </div>
            <?php endif; ?>

            <form action="index.php" method="post" class="col-12 validate-form" name="loginForm" id="val-form" novalidate>
                <h1 class="mb-3">Ingresar</h1>
                <div class="form-group">
                    <input type="text" id="loginUsername" name="username" class="form-control form-control-lg" placeholder="Nombre de usuario" required>
                    <div class="invalid-feedback">Por favor ingrese un nombre de usuario válido</div>
                    <div class="valid-feedback">Nombre de usuario válido</div>
                </div>
                <div class="form-group">
                    <input type="password" id="loginPassword" name="password" class="form-control form-control-lg" placeholder="Contraseña" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" minlength="8" required>
                    <div class="invalid-feedback">Por favor ingrese una contraseña válida</div>
                    <div class="valid-feedback">Contraseña válida</div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-light btn-lg btn-block">Ingresar &nbsp<i class="fas fa-sign-in-alt"></i></button>
                </div>
                <div class="container pass-manage">
                    <div class="forgotPassword"> <a href="reset-password.php">Restablecer contraseña</a></div>
                    <div class="forgotPassword"> <a href="forgot-password.php">¿Olvidó su contraseña?</a></div>
                </div>
            </form>
            <div class="modal-footer create-account">
                <p>¿No tiene cuenta? </p><a href="sign-up.php">Crear una cuenta</a>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>