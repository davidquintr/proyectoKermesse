<?php

class Vw_productos
{
    //Atributos
    private $id;
    private $comunidad;
    private $categoria_producto;
    private $nombre;
    private $descripcion;
    private $cantidad;
    private $preciov_sugerido;
    private $estado;
    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;}
}