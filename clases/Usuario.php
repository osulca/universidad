<?php

namespace Clases;

use Clases\ConexionDB as db;
use Clases\Estudiante as Estudiante;

require_once "config/autoload.php";

class Usuario
{
    private $usuario;
    private $password;
    private $tipo;
    private $id_estudiante;

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function setIdEstudiante($id_estudiante): void
    {
        $this->id_estudiante = $id_estudiante;
    }

    public function getDataLogin($usuario)
    {
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $resultados;
    }

    public function login($usuario, $password): bool
    {
        $resultados = $this->getDataLogin($usuario);

        // TODO: validar si devuelve resultados o no
        foreach ($resultados as $item) {
            $usuario_BD = $item["usuario"];
            $pass_BD = $item["pass"];
            $tipo = $item["tipo"];
            // se hacia referencia al id de usuario, no al de estudiante
            $id = $item["id_tabla"];
        }

        if ($usuario_BD == $usuario) {
            if (password_verify($password, $pass_BD)==true) {
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
    }

    public function crearUsuario(): bool
    {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO usuarios(usuario, pass, tipo, id_tabla) 
                    VALUES('$this->usuario','$this->password', '$this->tipo', $this->id_estudiante)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if ($numRows != 0) {
                $result = true;
            } else {
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}