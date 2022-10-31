<?php

class Tbl_Rol
{
    //Atributos
    private $id_rol;
    private $rol_descripcion;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}