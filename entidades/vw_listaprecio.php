<?php

class Vw_listaprecio
{
    //Atributos
    private $id;
    private $kermesse;  
    private $producto;
    private $nombre;
    private $descipcion;
    private $precio_venta;
    private $estado;
    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;}
}