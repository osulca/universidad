<?php
$tipo_usuario = $_SESSION["tipo"];

if ($tipo_usuario == "estudiante") {
    ?>
    <ul>
        <li><a href="bienvenido.php">Inicio</a></li>
    </ul>
    <?php
} else {
    ?>
    <ul>
        <li><a href="registrar.php">Registrar estudiante</a></li>
        <li><a href="regFacultad.php">Registrar facultad</a></li>
        <li><a href="regPrograma.php">Registrar programa</a></li>
    </ul>
    <?php
}
?>
<li><a href="salir.php">Salir</a></li>