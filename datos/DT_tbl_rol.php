<?php
include_once("conexion.php");
include_once("../../entidades/tbl_rol.php");


class Dt_tbl_rol extends Conexion
{
    private $myCon;

    public function listarRoles(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_rol;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Rol();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol', $r->id_rol);
                $c->__SET('rol_descripcion', $r->rol_descripcion);
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
$prueba = new Dt_tbl_rol();
$element = $prueba->listarRoles();

foreach($element as $value){
    echo "<br>";
    echo $value->id_rol;
	echo $value->rol_descripcion;
	echo $value->estado;
}
*/