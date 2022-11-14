<?php
include_once("conexion.php");
include_once("../entidades/tbl_tasacambio.php");


class Dt_tbl_Tasacambio extends Conexion{
    private $myCon;

    public function listarTasaCambio(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tbl_tasacambio;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_TasaCambio();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_tasaCambio', $r->id_tasaCambio);
                $c->__SET('id_monedaO', $r->id_monedaO);
                $c->__SET('id_monedaC', $r->id_monedaC);
                $c->__SET('mes', $r->mes);
                $c->__SET('anio', $r->anio);
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

$prueba = new Dt_tbl_Tasacambio();
$element = $prueba->listarTasaCambio();

foreach($element as $value){
    echo "<br>";
    echo $value->id_tasaCambio;
    echo "<br>";
    echo $value->id_monedaO;
    echo "<br>";
    echo $value->id_monedaC;
    echo "<br>";
    echo $value->mes;
    echo "<br>";
    echo $value->anio;
    echo "<br>";
    echo $value->estado;
}
