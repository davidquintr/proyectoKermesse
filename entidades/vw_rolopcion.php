<?php

class Vw_rolopcion{

    private $id;
    private $idRol;
    private $idOpc;
    private $rol;
    private $opcion;
   
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}