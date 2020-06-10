<?php
session_start();
echo "Bienvenido: ".$_SESSION["nombres"];
//$_GET["id"];

/*
$ids = $_COOKIE["userid"];
echo $ids[3]; */

echo "<br>El id es: ".$_SESSION["id"];
//echo "\n El nombre es: ".$_SESSION["apellidos"];