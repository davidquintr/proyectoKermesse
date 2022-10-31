<?php

class Tbl_TasaCambio
{
    //Atributos
    private $id_tasaCambio;
    private $id_monedaO;
    private $id_monedaC;
    private $mes;
    private $anio;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
