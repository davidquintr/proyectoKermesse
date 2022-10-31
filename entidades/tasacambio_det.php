<?php

class Tasacambio_Det
{
    //Atributos
    private $id_tasaCambio_det;
    private $id_tasaCambio;
    private $fecha;
    private $tipoCambio;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}