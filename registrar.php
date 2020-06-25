<?php
use Clases\Estudiante as Estudiante;
use Clases\Programa as Programa;

session_start();
if($_SESSION["id"]==null){
    header("Location: index.php");
}

include_once "config/autoload.php";
include_once "layout/header.php";
include_once "menu.php";
?>
    <h1 class="mt-4">Registrar Estudiantes</h1>
    <form method="post" action="#">
        <div class="form-group" style="width: 400px">
        <input class="form-control" type="text" name="codigo" placeholder="Codigo" required/><br>
        <input class="form-control" type="text" name="nombres" placeholder="Nombres" required/><br>
        <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" required/><br>
        <input class="form-control" type="text" name="telefono" placeholder="Telefono"/><br>
        <input class="form-control" type="email" name="correo" placeholder="Email"/><br>
        <select class="form-control" name="id_pa">
            <?php
            $programa = new Programa();
            $programas = $programa->verProgramas();
            foreach ($programas as $programa) {
                echo "<option value='" . $programa["id"] . "'>" . $programa["nombre"] . "</option>";
            }
            ?>
        </select>
        </div>
        <input type="submit" class="btn btn-info" name="submit" value="Guardar">

    </form>

<?php
if (isset($_POST["submit"])) {
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $id_pa = $_POST["id_pa"];

    $estudiante = new Estudiante();
    $estudiante->setCodigo($codigo);
    $estudiante->setNombres($nombres);
    $estudiante->setApellidos($apellidos);
    $estudiante->setTelefono($telefono);
    $estudiante->setCorreo($codigo);
    $estudiante->setIdPa($id_pa);

    if ($estudiante->crearEstudiante()) {
        echo "Datos guardados";
    } else {
        echo "Error: Los datos no se guardaron";
    }
}
include_once "layout/footer.php";
