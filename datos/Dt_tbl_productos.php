<?php
include_once("conexion.php");
include_once("../entidades/tbl_productos.php");


class Dt_tbl_productos extends Conexion
{
    private $myCon;

    public function listarProductos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_productos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_productos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_producto', $r->id_producto);
                $c->__SET('id_comunidad', $r->id_comunidad);
				$c->__SET('id_cat_producto', $r->id_cat_producto);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('descripcion', $r->descripcion);
				$c->__SET('cantidad', $r->cantidad);
				$c->__SET('preciov_sugerido', $r->preciov_sugerido);
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
