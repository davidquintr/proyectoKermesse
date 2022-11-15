<?php
include_once("conexion.php");
include_once("../../entidades/tbl_moneda.php");


class Dt_tbl_Moneda extends Conexion{
    private $myCon;

    public function listarMonedas(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_moneda;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Moneda();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_moneda', $r->id_moneda);
                $c->__SET('nombre', $r->nombre);
                $c->__SET('simbolo', $r->simbolo);
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
$prueba = new Dt_tbl_Moneda();
$element = $prueba->listarMonedas();

foreach($element as $value){
    echo "<br>";
    echo $value->id_moneda;
    echo "<br>";
    echo $value->nombre;
    echo "<br>";
    echo $value->simbolo;
    echo "<br>";
    echo $value->estado;
}
*/