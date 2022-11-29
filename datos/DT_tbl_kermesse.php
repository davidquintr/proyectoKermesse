<?php
include_once("conexion.php");
include_once("{$direct}entidades/tbl_kermesse.php");

class Dt_tbl_kermesse extends Conexion
{
    private $myCon;

    public function listarKermesse(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_kermesse where estado <> 3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_kermesse();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_kermesse', $r->id_kermesse);
                $c->__SET('idParroquia', $r->idParroquia);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('fInicio', $r->fInicio);
				$c->__SET('fFinal', $r->fFinal);
				$c->__SET('descripcion', $r->descripcion);
				$c->__SET('estado', $r->estado);
                $c->__SET('usuario_creacion', $r->usuario_creacion);
				$c->__SET('fecha_creacion', $r->fecha_creacion);
                $c->__SET('usuario_modificacion', $r->usuario_modificacion);
                $c->__SET('fecha_modificacion', $r->fecha_modificacion);
                $c->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $c->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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
$prueba = new Dt_tbl_kermesse();
$element = $prueba->listarKermesse();

foreach($element as $value){
    echo "<br>";
    echo $value->id_kermesse;
    echo $value->idParroquia;
    echo $value->nombre;
    echo $value->fInicio;
    echo $value->fFinal;
    echo $value->descripcion;
    echo $value->estado;
    echo $value->usuario_creacion;
    echo $value->fecha_creacion;
    echo $value->usuario_modificacion;
    echo $value->fecha_modificacion;
    echo $value->usuario_eliminacion;
    echo $value->fecha_eliminacion;
}
*/