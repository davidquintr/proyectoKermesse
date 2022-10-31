<?php

class Tbl_Comunidad
{
    //Atributos
    private $id_comunidad;
    private $nombre;
    private $responsable;
    private $desc_contribucion;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
