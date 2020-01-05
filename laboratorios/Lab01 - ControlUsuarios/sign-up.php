<?php

require 'conexion.php';

if (!empty($_POST['username']) && !empty($_POST['password'])){
    $message = registrarUsuario($_POST['username'], $_POST['name'], $_POST['apellido1'], $_POST['apellido2'], $_POST['email'], $_POST['telephone'], $_POST['birthday'], $_POST['password']);
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

    <link rel="stylesheet" href="css/sign-up.css">
    <script src="https://kit.fontawesome.com/81e97a4bb9.js" crossorigin="anonymous"></script>
    <script src="js/checkValidity.js"></script>

    <title>Registrarse</title>
</head>

<body>

    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            
            <?php if(!empty($message)): ?>
            <div class="modal-header alert-space">
                <div id="cong-alert" class="alert alert-light" role="alert"><?= $message ?></div>
            </div>
            <?php endif; ?>

            <form action="sign-up.php" method="post" class="col-12 validate-form" id="val-form" novalidate>
                <h1 class="mb-3">Crear una cuenta</h1>
                <div class="form-row">
                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                        <div class="invalid-feedback">Por favor ingrese un nombre válido</div>
                    </div>
                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer apellido" required>
                        <div class="invalid-feedback">Por favor ingrese un apellido válido</div>
                    </div>
                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo apellido" required>
                        <div class="invalid-feedback">Por favor ingrese un apellido válido</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                        <div class="invalid-feedback">Por favor ingrese un nombre de usuario válido</div>
                    </div>
                    <div class="form-group col-md">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" minlength="8" required>
                        <div class="invalid-feedback">La contraseña debe tener como mínimo 8 dígitos, y al menos una letra mayúscula, una minúscula y un número</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                        <div class="invalid-feedback">Por favor ingrese un correo electrónico válido</div>
                    </div>
                    <div class="form-group col-md">
                        <input type="tel" pattern="[0-9]{8}" class="form-control" id="telephone" name="telephone" maxlength="8" placeholder="Teléfono" required>
                        <div class="invalid-feedback">Por favor ingrese un número de teléfono válido</div>
                    </div>
                    <div class="form-group col-md">
                        <input type="date" class="form-control" id="birthday" name="birthday" required>
                        <div class="invalid-feedback">Por favor ingrese una fecha válida</div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-light btn-lg">Registrarse &nbsp<i class="fas fa-user-plus"></i></button>
                </div>
            </form>
            <div class="modal-footer signin">
                <p>¿Ya tienes una cuenta? </p><a href="index.php">Ingresar</a>
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