<?php
include_once("conexion.php");
include_once("../../entidades/rol_usuario.php");


class Dt_rol_usuario extends Conexion
{
    private $myCon;

    public function listarRolUsuarios(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Rol_Usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol_usuario', $r->id_rol_usuario);
                $c->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                $c->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
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
$prueba = new Dt_rol_usuario();
$element = $prueba->listarRolUsuario();

foreach($element as $value){
    echo "<br>";
    echo $value->id_rol_usuario;
    echo $value->tbl_usuario_id_usuario;
    echo $value->tbl_rol_id_rol;
}
*/