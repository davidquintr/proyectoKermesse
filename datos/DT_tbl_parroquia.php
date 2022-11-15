<?php
include_once("conexion.php");
include_once("../entidades/tbl_parroquia.php");


class Dt_tbl_parroquia extends Conexion
{
    private $myCon;

    public function listarParroquia(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_parroquia;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_parroquia();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('idParroquia', $r->idParroquia);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('direccion', $r->direccion);
				$c->__SET('telefono', $r->telefono);
				$c->__SET('parroco', $r->parroco);
				$c->__SET('logo', $r->logo);
				$c->__SET('sitio_web', $r->sitio_web);
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
$prueba = new Dt_tbl_parroquia();
$element = $prueba->listarParroquia();

foreach($element as $value){
    echo "<br>";
    echo $value->idParroquia;
    echo $value->nombre;
    echo $value->direccion;
    echo $value->telefono;
    echo $value->parroco;
    echo $value->logo;
    echo $value->sitio_web;
}
*/