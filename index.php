<?php
Use Clases\Usuario as Usuario;

include_once "config/autoload.php";
?>
    <form action="#" method="post">
        <input type="text" name="usuario" placeholder="Ingrese Usuario"></br>
        <input type="password" name="pass" placeholder="Ingrese Contraseña"></br>
        <input type="submit" name="submit" value="Login">
    </form>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $user = new Usuario();
    $login = $user->login($usuario, $pass);

    if ($login) {
        header("Location: bienvenido.php");
    } else {
        echo "usuario o contraseña incorrecto";
    }
}