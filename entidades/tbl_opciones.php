<?php

class Tbl_Opciones
{
    //Atributos
    private $id_opciones;
    private $opcion_descripcion;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}