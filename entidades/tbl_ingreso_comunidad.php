<?php

class Tbl_Ingreso_Comunidad
{
    //Atributos
    private $id_ingreso_comunidad;
    private $id_kermesse;
    private $id_comunidad;
    private $id_producto;
    private $cant_productos;
    private $total_bonos;
    private $estado;
    private $usuario_creacion;
    private $fecha_creacion;
    private $usuario_modificacion;
    private $fecha_modificacion;
    private $usuario_eliminacion;
    private $fecha_eliminacion;

    //Metodos
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
