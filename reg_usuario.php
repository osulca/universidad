<?php

use Clases\Usuario as Usuario;
use Clases\Estudiante as Estudiante;

include_once "config/autoload.php";

function validarUsuario($usuario): bool
{
    return (filter_var($usuario, FILTER_SANITIZE_STRING) === False) ? false : true;
}

function validarUsuario2($usuario): bool
{
    return preg_match("/[a-zA-Z]+/", $usuario);
}

function validarPassword($password): bool
{
    $length = strlen($password);
    if ($length < 8) {
        return false;
    }
    return true;
}

?>
    <h1>Registro de Usuarios</h1>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="usuario" placeholder="Ingrese nuevo usuario"/><br>
        <input type="password" name="pass" placeholder="Ingrese contraseña"/><br>
        <select name="tipo">
            <option value="estudiante">estudiante</option>
            <option value="profesor">profesor</option>
            <option value="administrativo">administrativo</option>
        </select><br>
        <select name="id_estudiante">
            <?php
            $estudiante = new Estudiante();
            $resultados = $estudiante->getDataEstudiantes();
            foreach ($resultados as $item) {
                echo "<option value='" . $item["id"] . "'>" . $item["nombres"] . " " . $item["apellidos"] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" name="submit" value="Registrar">
    </form>
<?php
if (isset($_POST["submit"])) {
    $usuario = strtolower(trim($_POST["usuario"]));
    $password = strtolower(trim($_POST["pass"]));
    $tipo = $_POST["tipo"];
    $id_estudiante = $_POST["id_estudiante"];

    $errores = [];

    if ((strlen($usuario) == 0) or (strlen($password) == 0)) {
        $errores[] = "complete los campos";
    }

    if (validarUsuario2($usuario) != true) {
        $errores[] = "el usuario no tiene el formato adecuado";
    }

    if (validarPassword($password) != true) {
        $errores[] = "la contraseña debe tener al menos 8 caracteres";
    }

    foreach ($errores as $error) {
        echo $error . "<br>";
    }

    if (count($errores) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $user = new Usuario();
        $user->setUsuario($usuario);
        $user->setPassword($password);
        $user->setTipo($tipo);
        $user->setIdEstudiante($id_estudiante);

        $result = $user->crearUsuario();
        if ($result == true) {
            echo "usuario creado";
        } else {
            echo "Error: usuario no creado";
        }
    }
}