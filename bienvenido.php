<?php
session_start();
include_once "layout/header.php";
include_once "menu.php";
?>
    <?php
    if ($_SESSION["id"] == null) {
        header("Location: index.php");
    }

    echo "Bienvenido: " . $_SESSION["nombres"];
    ?>
    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th>&nbsp;</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Programa</th>
            <th colspan="2">&nbsp;</th>
        </tr>
        </thead>
        <!-- TODO: cargar datos de los estudiantes -->
        <tbody>
        <tr>
            <td>1</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Nombre Programa</td>
            <td><a href="actualizar.php?id=1">Actualizar</a></td>
            <td><a href="eliminar.php?id=1">Eliminar</a></td>
        </tr>
        </tbody>
    </table>
<?php
include_once "layout/footer.php";
/*    session_start();
    $_SESSION["id"] = 1;
    $_SESSION["apellidos"]="Sulca";
    session_unset();
    session_destroy();

    setcookie("userid",2,time()+3600);
    setcookie("userid",2,time()-6600);
    echo $_COOKIE["userid"];
*/