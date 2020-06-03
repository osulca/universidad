<?php
use bd\ConexionDB as db;

class Usuario
{
    private $nombres;
    private $apellidos;
    private $telefono;
    private $correo;

    public function __construct($nombres, $apellidos, $telefono, $correo)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }

    // getter y setters
    public function getNombres(): string
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    // TODO: determinar tipo de dato de retorno
    public function getTelefono(): int
    {
        return $this->telefono;
    }

    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    // métodos de bd
    public function crearUsuario() : bool {
        $result = false;
        try {
            $db = new db();
            $conn = $db->cerrarConexion();

            //TODO: modificar funcion de forma que al heredar permita ejecutar el metodo sin repetir el codigo
            $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) VALUES('$this->codigo','$this->nombres', '$this->apellidos', '$this->telefono', '$this->correo', 1)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}