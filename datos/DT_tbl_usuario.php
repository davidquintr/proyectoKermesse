<?php
include_once("conexion.php");
include_once("../entidades/tbl_usuario.php");


class Dt_tbl_usuario extends Conexion
{
    private $myCon;

    public function listarUsuarios(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_usuario', $r->id_usuario);
				$c->__SET('usuario', $r->usuario);
				$c->__SET('pwd', $r->pwd);
				$c->__SET('nombres', $r->nombres);
				$c->__SET('apellidos', $r->apellidos);
				$c->__SET('email', $r->email);
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