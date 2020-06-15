<?php
namespace Clases;
use Clases\ConexionDB as db;

require_once "config/autoload.php";

class Estudiante
{
    protected $nombres;
    protected $apellidos;
    protected $telefono;
    protected $correo;
    protected $id_pa;
    private $codigo;

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    public function getIdPa()
    {
        return $this->id_pa;
    }

    public function setIdPa($id_pa): void
    {
        $this->id_pa = $id_pa;
    }

    public function crearEstudiante() : bool {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) 
                    VALUES('$this->codigo','$this->nombres', '$this->apellidos', '$this->telefono', '$this->correo', $this->id_pa)";
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

    public function getDataEstudiantePorId($id){
        $resultados = null;
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM estudiantes WHERE id = $id";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $resultados = $respuesta->fetchAll();

            $db->cerrarConexion();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $resultados;
    }
}