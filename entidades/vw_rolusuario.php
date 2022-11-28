<?php

class Vw_rolusuario
{
    //Atributos
    private $id;
    private $usuario;
    private $nombre;
    private $rol;
    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;}
}