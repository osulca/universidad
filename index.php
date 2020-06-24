<?php

use Clases\ControladorUsuario as ControladorUsuario;

include_once "config/autoload.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Sistema Universidad</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body class="bg-light">
    <div class="text-center mt-5">
        <h1>Login</h1>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="usuario" placeholder="Ingrese Usuario"></br>
        <input class="mt-1" type="password" name="pass" placeholder="Ingrese Contraseña"></br>
        <input class="btn btn-info mt-2" type="submit" name="submit" value="Login">
    </form>
    <a href="reg_usuario.php">Registrese</a>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    </html>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $controladorUsuario = new ControladorUsuario();
    $login = $controladorUsuario->login($usuario, $pass);

    if ($login) {
        header("Location: bienvenido.php");
    } else {
        echo "<div class='text-center text-danger mt-3'>usuario y/o contraseña incorrecto<div>";
    }
}