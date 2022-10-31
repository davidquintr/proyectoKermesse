<?php

class Tbl_Lista_Precio
{
    //Atributos
    private $id_lista_precio;
    private $id_kermesse;
    private $nombre;
    private $descripcion;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
