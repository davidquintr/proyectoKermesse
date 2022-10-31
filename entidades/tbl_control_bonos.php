<?php

class Tbl_Control_Bonos
{
    //Atributos
    private $id_bono;
    private $nombre;
    private $valor;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}