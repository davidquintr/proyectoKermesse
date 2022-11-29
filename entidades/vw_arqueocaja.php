<?php

class Vw_arqueocaja
{
    //Atributos
    private $id;
    private $kermesse;
    private $moneda;
    private $denominacion;
    private $cantidad;
    private $fechaArqueo;
    private $subtotal;
    private $granTotal;
    private $estado;
    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;}
}