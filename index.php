<?php
include_once "menu.php";
session_start();
echo "Bienvenido: ".$_SESSION["nombres"];
?>
<table border="1">
    <tr>
        <th>&nbsp;</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Programa</th>
        <th colspan="2">&nbsp;</th>
    </tr>
    <!-- TODO: cargar datos de los estudiantes -->
    <tr>
        <td>1</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Nombre Programa</td>
        <td><a href="actualizar.php?id=1">Actualizar</a></td>
        <td><a href="eliminar.php?id=1">Eliminar</a></td>
    </tr>
</table>
<?php
/*    session_start();
    $_SESSION["id"] = 1;
    $_SESSION["apellidos"]="Sulca";
    session_unset();
    session_destroy();

    setcookie("userid",2,time()+3600);
    setcookie("userid",2,time()-6600);
    echo $_COOKIE["userid"];
*/
