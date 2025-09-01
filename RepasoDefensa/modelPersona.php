<?php
class Persona
{
    private $ci;    //PRIMARY KEY
    private $nombre;
    private $edad;
    public function getCi()
    {
        return $this->ci;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function __construct($ci, $nombre, $edad)
    {
        if($edad>17)
        {
            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
    }
    //funcionalidades
}
?>