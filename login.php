<form action="#" method="post">
    <input type="text" name="usuario" placeholder="Ingrese Usuario"></br>
    <input type="password" name="pass" placeholder="Ingrese Contraseña"></br>
    <input type="submit" name="submit" value="Login">
</form>
<?php
if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    //TODO: conectarme a la base de datos
    //TODO: extraer datos de usuario
    $usuario_BD = "pedrosc";
    $pass_BD = "12345";
    //TODO: comparacion de datos
        if($usuario_BD == $usuario){
            if($pass_BD == $pass){
                // si coincide, crear session
                session_start();
                $_SESSION["id"]="3";
                $_SESSION["nombres"] = "Pedro Sanchez";
                $_SESSION["codigo"] = "1231233423";
                $_SESSION["tipo"] = "docente";
                //TODO redireccionar a pagina inicial
                header("Location: index.php");
            }else{
                // si no coincide, enviar mensaje
                echo "usuario o contraseña incorrecto";
            }
        }else{
            echo "usuario o contraseña incorrecto";
        }
}