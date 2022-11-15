<?php
include_once("conexion.php");
include_once("../entidades/tasacambio_det.php");


class Dt_Tasacambio_det extends Conexion{
	private $myCon;
	
    public function listarTasaCambio_det(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tasacambio_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tasacambio_Det();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_tasaCambio_det', $r->id_tasaCambio_det);
                $c->__SET('id_tasaCambio', $r->id_tasaCambio);
                $c->__SET('fecha', $r->fecha);
                $c->__SET('tipoCambio', $r->tipoCambio);
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

$prueba = new Dt_Tasacambio_det();
$element = $prueba->listarTasaCambio_det();

/*
foreach($element as $value){
    echo "<br>";
    echo $value->id_tasaCambio_det;
    echo "<br>";
    echo $value->id_tasaCambio;
    echo "<br>";
    echo $value->fecha;
    echo "<br>";
    echo $value->tipoCambio;
}*/
