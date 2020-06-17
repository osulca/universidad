<?php
Use Clases\Usuario as Usuario;

include_once "config/autoload.php";
?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <input type="text" name="usuario" placeholder="Ingrese Usuario"></br>
        <input type="password" name="pass" placeholder="Ingrese Contraseña"></br>
        <input type="submit" name="submit" value="Login">
    </form>
    <a href="reg_usuario.php">Registrese</a>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    $user = new Usuario();
    $login = $user->login($usuario, $pass);

    if ($login) {
        header("Location: bienvenido.php");
    } else {
        echo "usuario y/o contraseña incorrecto";
    }
}