<?php
include_once("conexion.php");
include_once("../../entidades/tbl_usuario.php");


class Dt_tbl_control_bonos extends Conexion
{
    private $myCon;

    public function listarControlBonos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_control_bonos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Control_Bonos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_bono', $r->id_bono);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('valor', $r->valor);
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