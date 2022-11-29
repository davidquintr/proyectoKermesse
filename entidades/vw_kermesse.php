<?php

class Vw_kermesse{

    private $id;
    private $parroquia;
    private $nombre;
    private $fInicio;
    private $fFinal;
    private $descripcion;
    private $estado;
   
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}