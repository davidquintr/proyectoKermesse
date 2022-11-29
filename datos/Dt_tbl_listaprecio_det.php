<?php
include_once("conexion.php");
include_once("../../entidades/tbl_listaprecio_det.php");


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
	public function insertarlistpreciodet(Tbl_ListaPrecio_Det $arq){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_listaprecio_det (id_lista_precio, id_producto, precio_venta)
                VALUES(?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $arq->__GET('id_lista_precio'),
                    $arq->__GET('id_producto'),
                    $arq->__GET('precio_venta'),
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getListPDetByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio_det WHERE id_listaprecio_det = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_ListaPrecio_Det();

			$u->__SET('id_listaprecio_det', $r->id_listaprecio_det);
            $u->__SET('id_lista_precio', $r->id_lista_precio);
			$u->__SET('id_producto', $r->id_producto);
			$u->__SET('precio_venta', $r->precio_venta);
			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function editListpreciodet(Tbl_ListaPrecio_Det $ac){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_listaprecio_det SET
						id_lista_precio = ?,
						id_producto = ?, 
						precio_venta = ? 
				    WHERE id_listaprecio_det = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$ac->__GET('id_lista_precio'),
						$ac->__GET('id_producto'),
						$ac->__GET('precio_venta'),
						$ac->__GET('id_listaprecio_det')
					)
				);

			$this->myCon = parent::desconectar();
		
		} catch (Exception $e) {
			var_dump($e);

			header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=4");
			die($e->getMessage());
		}
	}
}
