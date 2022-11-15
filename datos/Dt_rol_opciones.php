<?php
include_once("conexion.php");
include_once("../entidades/rol_opciones.php");


class Dt_rol_opciones extends Conexion
{
    private $myCon;

    public function listarRolOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_opciones;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Rol_Opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol_opciones', $r->id_rol_opciones);
                $c->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $c->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
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

$prueba = new Dt_rol_opciones();
$element = $prueba->listarRolOpciones();

foreach($element as $value){
    echo "<br>";
    echo $value->id_rol_opciones;
    echo $value->tbl_rol_id_rol;
    echo $value->tbl_opciones_id_opciones;
}
