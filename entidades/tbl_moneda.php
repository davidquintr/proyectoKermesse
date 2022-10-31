<?php

class Tbl_Denominacion
{
    //Atributos
    private $id_moneda;
    private $nombre;
    private $simbolo;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
