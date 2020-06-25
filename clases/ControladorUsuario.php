<?php

namespace Clases;

use Clases\Estudiante as Estudiante;
use Clases\Usuario as Usuario;

require_once "config/autoload.php";

class ControladorUsuario
{
    public function login($usuario, $password): bool
    {
        $claseUsuario = new Usuario();
        $resultados = $claseUsuario->getDataLogin($usuario);

        if (count($resultados) != 0) {
            // TODO: validar si devuelve resultados o no
            foreach ($resultados as $item) {
                $usuario_BD = $item["usuario"];
                $pass_BD = $item["pass"];
                $tipo = $item["tipo"];
                // se hacia referencia al id de usuario, no al de estudiante
                $id = $item["id_tabla"];
            }

            if ($usuario_BD == $usuario) {
                if (password_verify($password, $pass_BD) == true) {
                    // la tabla estaba mal nombrada
                    $estudiante = new Estudiante();
                    $resultados = $estudiante->getDataEstudiantePorId($id);
                    foreach ($resultados as $item) {
                        $id_estudiante = $id;
                        $nombres = $item["nombres"];
                        $apellidos = $item["apellidos"];
                        $codigo = $item["codigo"];
                    }
                    // corregida valores erroneos
                    session_start();
                    $_SESSION["id"] = $id_estudiante;
                    $_SESSION["nombres"] = $nombres . " " . $apellidos;
                    $_SESSION["codigo"] = $codigo;
                    $_SESSION["tipo"] = $tipo;
                    $resultado = true;

                } else {
                    // si no coincide, enviar mensaje
                    $resultado = false;
                }
            } else {
                $resultado = false;
            }
            return $resultado;
        } else {
            return false;
        }
    }
}