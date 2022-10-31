<?php

class Rol_Opciones
{
    //Atributos
    private $id_rol_opciones;
    private $tbl_rol_id_rol;
    private $tbl_opciones_id_opciones;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}