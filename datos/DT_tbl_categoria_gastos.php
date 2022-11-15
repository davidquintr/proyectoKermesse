<?php
include_once("conexion.php");
include_once("../entidades/tbl_categoria_gastos.php");


class Dt_tbl_categoria_gastos extends Conexion
{
    private $myCon;

    public function listarCatGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_gastos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_categoria_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_categoria_gastos', $r->id_categoria_gastos);
				$c->__SET('nombre_categoria', $r->nombre_categoria);
				$c->__SET('descripcion', $r->descripcion);
				$c->__SET('estado', $r->estado);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}
/*
$prueba = new Dt_tbl_categoria_gastos();
$element = $prueba->listarCatGastos();

foreach($element as $value){
    echo "<br>";
    echo $value->id_categoria_gastos;
    echo $value->nombre_categoria;
    echo $value->descripcion;
    echo $value->estado;
}
*/