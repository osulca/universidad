<?php
session_start();
session_unset();
session_destroy();
// destruir variable para control
unset($_SESSION["id"]);

header("Location: index.php");
