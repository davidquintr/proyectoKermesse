<?php

class Vw_denominacion {
    
    private $id;
    private $moneda;
    private $valor;
    private $valor_letras;
    private $estado;
    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}