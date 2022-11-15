<?php
include_once("conexion.php");
include_once("../entidades/tbl_usuario.php");


class Dt_tbl_comunidad extends Conexion
{
    private $myCon;

    public function listarComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_comunidad;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_comunidad', $r->id_comunidad);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('responsable', $r->responsable);
				$c->__SET('desc_contribucion', $r->desc_contribucion);
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
$prueba = new Dt_tbl_usuario();
$element = $prueba->listarUsuarios();

foreach($element as $value){
    echo "<br>";
    echo $value->id_usuario;
    echo $value->usuario;
    echo $value->pwd;
    echo $value->nombres;
    echo $value->apellidos;
    echo $value->email;
    echo $value->estado;
}
*/