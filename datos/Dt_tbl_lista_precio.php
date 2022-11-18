<?php
include_once("conexion.php");
include_once("../entidades/tbl_productos.php");


class Dt_tbl_lista_precio extends Conexion
{
    private $myCon;

    public function listarPrecio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_lista_precio;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_Lista_Precio();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_lista_precio', $r->id_lista_precio);
                $c->__SET('id_kermesse', $r->id_kermesse);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('descripcion', $r->descripcion);
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
