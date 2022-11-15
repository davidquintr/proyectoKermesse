<?php
include_once("conexion.php");
include_once("../entidades/tbl_gastos.php");


class Dt_tbl_gastos extends Conexion
{
    private $myCon;

    public function listarGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_gastos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_registro_gastos', $r->id_registro_gastos);
                $c->__SET('idKermesse', $r->idKermesse)
				$c->__SET('idCatGastos', $r->idCatGasto);
				$c->__SET('fechaGasto', $r->fechaGasto);
				$c->__SET('concepto', $r->concepto);
				$c->__SET('monto', $r->monto);
				$c->__SET('usuario_creacion', $r->usuario_creacion);
				$c->__SET('fecha_creacion', $r->fecha_creacion);
                $c->__SET('usuario_modificacion', $r->usuario_modificacion);
                $c->__SET('fecha_modificacion', $r->fecha_modificacion)
                $c->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $c->__SET('fecha_eliminacion', $r->fecha_eliminacion)
                $c->__SET('estado', $r->estado)
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
$prueba = new Dt_tbl_gastos();
$element = $prueba->listarGastos();

foreach($element as $value){
    echo "<br>";
    echo $value->id_registro_gastos;
    echo $value->idKemesse;
    echo $value->idCatGastos;
    echo $value->fechaGasto;
    echo $value->concepto;
    echo $value->monto;
    echo $value->usuario_creacion;
    echo $value->fecha_creacion;
    echo $value->usuario_modificacion;
    echo $value->fecha_modificacion;
    echo $value->usuario_eliminacion;
    echo $value->fecha_eliminacion;
}
*/