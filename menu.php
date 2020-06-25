<?php
$tipo_usuario = $_SESSION["tipo"];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-propio">
        <a class="navbar-brand" href="bienvenido.php">UDH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miNavbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="miNavbar">
<?php
if ($tipo_usuario == "estudiante") {
    ?>
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="bienvenido.php">Inicio</a></li>
    <?php
} else {
    ?>      <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="registrar.php">Registrar estudiante</a></li>
                <li class="nav-item"><a class="nav-link" href="regFacultad.php">Registrar facultad</a></li>
                <li class="nav-item"><a class="nav-link" href="regPrograma.php">Registrar programa</a></li>
    <?php
}
?>
            <li class="nav-item"><a class="nav-link" href="salir.php">Salir</a></li>
        </ul>
    </div>
</nav>
<div class="container">
