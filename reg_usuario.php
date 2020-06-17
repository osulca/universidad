<?php

use Clases\Usuario as Usuario;
use Clases\Estudiante as Estudiante;

include_once "config/autoload.php";
?>
    // formulario de registro que muestre los estudiantes en select para relacionar
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
                echo "<option value='" . $item["id"] . "'>" . $item["nombres"]." ".$item["apellidos"] . "</option>";
            }
            ?>
        </select><br>
        <input type="submit" name="submit" value="Registrar">
    </form>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["pass"];
    $tipo = $_POST["tipo"];
    $id_estudiante = $_POST["id_estudiante"];

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