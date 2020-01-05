<?php

$dbhost = "remotemysql.com:3306";
$dbuser = "NOR595KT8Q";
$dbpass = "AvqnhaEhge";
$database = "NOR595KT8Q";

function conectar()
{
    global $dbhost, $dbuser, $dbpass, $database, $conn;
    try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$database;", $dbuser, $dbpass);
    } catch (PDOException $e) {
        die('Could not connect: ' . $e->getMessage());
    }
}

function registrarUsuario($username, $name, $apellido1, $apellido2, $email, $telephone, $birthday, $pass)
{
    conectar();
    global $conn;

    $sql = "insert into Usuarios (nombreUsuario, nombre, primerApellido, segundoApellido, contrasena, correo, telefono, cumpleanos) values (:nombreUsuario, :nombre, :primerApellido, :segundoApellido, :contrasena, :correo, :telefono, :cumpleanos)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombreUsuario', $username);
    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':primerApellido', $apellido1);
    $stmt->bindParam(':segundoApellido', $apellido2);
    $stmt->bindParam(':correo', $email);
    $stmt->bindParam(':telefono', $telephone);
    $stmt->bindParam(':cumpleanos', $birthday);
    $password = password_hash($pass, PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena', $password);

    if ($stmt->execute()) {
        $conn = null;
        return '¡Felicidades! Se ha registrado de
        forma exitosa. Vaya a la página de <a href="index.php" class="alert-link">inicio de sesión</a> para ingresar.';
    } else {
        $conn = null;
        return 'Ha ocurrido un error. Inténtelo de nuevo más tarde.';
    }
    
}

function validarUsuario($username, $password)
{
    conectar();
    global $conn;

    $records = $conn->prepare("select nombreUsuario, contrasena from Usuarios where nombreUsuario = :username");
    $records->bindParam(':username', $username);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    return password_verify($password, $results['contrasena']);
}

function restablecerContrasena($username, $password, $newPassword)
{
    conectar();
    global $conn;

    if(validarUsuario($username, $password)){
        $stmt = $conn->prepare("update Usuarios set contrasena = :newPassword where nombreUsuario = :username");
        $stmt->bindParam(':username', $username);
        $pass = password_hash($newPassword, PASSWORD_BCRYPT);
        $stmt->bindParam(':newPassword', $pass);

        if ($stmt->execute()) {
            $conn = null;
            return 'Su contraseña ha sido cambiada de forma exitosa';
        } else {
            $conn = null;
            return 'Ha ocurrido un error. Inténtelo de nuevo más tarde.';
        }
    } else {
        $conn = null;
        return 'Nombre de usuario o contraseña incorrecto';
    }
}

function enviarCorreo($email){
    $pass = generarContrasena(10);
    $from = "gabrielquiros10@gmail.com";
    $subject = "Cambiar contraseña webpage de Gabriel";
    $msg = "Su contraseña temporal es ".$pass.". Diríjase a Restablecer contraseña para cambiarla.";
    $headers = "De:" . $from;

    mail($email, $subject, $msg, $headers);

}

function generarContrasena($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}