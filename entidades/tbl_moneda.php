<?php

class Tbl_Moneda
{
    //Atributos
    private $id_moneda;
    private $nombre;
    private $simbolo;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
