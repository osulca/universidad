<?php


class Programa
{
    private $nombre;
    private $id_facultad;

    public function __construct($nombre, $id_facultad)
    {
        $this->nombre = $nombre;
        $this->id_facultad = $id_facultad;
    }

    public function getNombre():string
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getIdFacultad():int
    {
        return $this->id_facultad;
    }

    public function setIdFacultad($id_facultad): void
    {
        $this->id_facultad = $id_facultad;
    }

}