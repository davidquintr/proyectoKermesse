<?php
include_once("conexion.php");
include_once("../entidades/tbl_arqueocaja.php");


class Dt_tbl_Arqueocaja extends Conexion{
    private $myCon;

    public function listarArqueoCaja(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Arqueocaja();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_ArqueoCaja', $r->id_ArqueoCaja);
                $c->__SET('idKermesse', $r->idKermesse);
                $c->__SET('fechaArqueo', $r->fechaArqueo);
                    $c->__SET('granTotal', $r->granTotal);
                    $c->__SET('usuario_creacion', $r->usuario_creacion);
                $c->__SET('fecha_creacion', $r->fecha_creacion);
                $c->__SET('usuario_modificacion', $r->usuario_modificacion);
                $c->__SET('fecha_modificacion', $r->fecha_modificacion);
                $c->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $c->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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
$prueba = new Dt_tbl_Arqueocaja();
$element = $prueba->listarArqueoCaja();

foreach($element as $value){
    echo "<br>";
    echo $value->id_ArqueoCaja;
    echo "<br>";
    echo $value->idKermesse;
    echo "<br>";
    echo $value->fechaArqueo;
    echo "<br>";
    echo $value->granTotal;
    echo "<br>";
    echo $value->usuario_creacion;
    echo "<br>";
    echo $value->fecha_creacion;
    echo "<br>";
    echo $value->usuario_modificacion;
    echo "<br>";
    echo $value->fecha_modificacion;
    echo "<br>";
    echo $value->usuario_eliminacion;
    echo "<br>";
    echo $value->fecha_eliminacion;
    echo "<br>";
    echo $value->estado;
}
*/