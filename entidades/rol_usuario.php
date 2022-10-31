<?php

class Rol_Usuario
{
    //Atributos
    private $id_rol_usuario;
    private $tbl_usuario_id_usuario;
    private $tbl_rol_id_rol;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}