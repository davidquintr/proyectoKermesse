<?php

class Tbl_Categoria_Gastos
{
    //Atributos
    private $id_categorias_gastos;
    private $nombre_categoria;
    private $descripcion;
    private $estado;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}