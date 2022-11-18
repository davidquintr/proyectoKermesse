<?php
include_once("conexion.php");
include_once("../entidades/tbl_listaprecio_det.php");


class Dt_tbl_listaprecio_det extends Conexion
{
    private $myCon;

    public function listarPrecioDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_listaprecio_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_ListaPrecio_Det();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_listaprecio_det', $r->id_listaprecio_det);
                $c->__SET('id_lista_precio', $r->id_lista_precio);
				$c->__SET('id_producto', $r->id_producto);
				$c->__SET('precio_venta', $r->precio_venta);
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
