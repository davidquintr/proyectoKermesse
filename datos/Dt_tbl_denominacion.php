<?php
include_once("conexion.php");
include_once("../entidades/tbl_denominacion.php");


class Dt_tbl_Denominacion extends Conexion{
    private $myCon;

    public function listarDenominaciones(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_denominacion; ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Denominacion();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_denominacion', $r->id_Denominacion);
                $c->__SET('idMoneda', $r->idMoneda);
                $c->__SET('valor', $r->valor);
                $c->__SET('valor_letras', $r->valor_letras);
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

$prueba = new Dt_tbl_Denominacion();
$element = $prueba->listarDenominaciones();

foreach($element as $value){
    echo "<br>";
    echo $value->id_denominacion;
    echo "<br>";
    echo $value->idMoneda;
    echo "<br>";
    echo $value->valor;
    echo "<br>";
    echo $value->valor_letras;
    echo "<br>";
    echo $value->estado ;
}
