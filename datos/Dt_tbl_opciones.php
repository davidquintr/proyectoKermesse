<?php
include_once("conexion.php");
include_once("../entidades/tbl_opciones.php");


class Dt_tbl_opciones extends Conexion
{
    private $myCon;

    public function listarOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_opciones;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_opciones', $r->id_opciones);
                $c->__SET('opcion_descripcion', $r->opcion_descripcion);
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

$prueba = new Dt_tbl_opciones();
$element = $prueba->listarOpciones();

foreach($element as $value){
    echo "<br>";
    echo $value->id_opciones;
    echo $value->opcion_descripcion;
    echo $value->estado;
}
