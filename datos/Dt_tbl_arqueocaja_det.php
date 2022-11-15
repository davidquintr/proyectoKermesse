<?php
include_once("conexion.php");
include_once("../../entidades/tbl_arqueocaja_det.php");


class Dt_Tbl_arqueocaja_det extends Conexion{
    private $myCon;

    public function listarArqueoCaja_det(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Arqueocaja_Det();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_tasaCambio_det', $r->idArqueoCaja_Det);
                $c->__SET('idArqueoCaja', $r->idArqueoCaja);
                $c->__SET('idMoneda', $r->idMoneda);
                $c->__SET('idDenominacion', $r->idDenominacion);
                $c->__SET('cantidad', $r->cantidad);
                $c->__SET('subtotal', $r->subtotal);
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
$prueba = new Dt_Tbl_arqueocaja_det();
$element = $prueba->listarArqueoCaja_det();

foreach($element as $value){
    echo "<br>";
    echo $value->idArqueoCaja_Det;
    echo "<br>";
    echo $value->idArqueoCaja;
    echo "<br>";
    echo $value->idMoneda;
    echo "<br>";
    echo $value->idDenominacion;
    echo "<br>";
    echo $value->cantidad;
    echo "<br>";
    echo $value->subtotal;
}*/
