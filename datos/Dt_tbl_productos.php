<?php
include_once("conexion.php");
include_once("../entidades/tbl_productos.php");


class Dt_tbl_productos extends Conexion
{
    private $myCon;

	public function listarVwProductos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_productos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $c = new Vw_productos();
		
                $c->__SET('id', $r->id);
                $c->__SET('comunidad', $r->comunidad);
                $c->__SET('categoria_producto', $r->categoria_producto);
                $c->__SET('nombre', $r->nombre);
                $c->__SET('descripcion', $r->descripcion);
                $c->__SET('cantidad', $r->cantidad);
                $c->__SET('preciov_sugerido', $r->preciov_sugerido);
                $c->__SET('estado', $r->estado);
                $result[] = $c;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


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



	public function insertarProductos(Tbl_Productos $prod){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_productos (id_comunidad,id_cat_producto,nombre, descripcion,cantidad, preciov_sugerido, estado)
                VALUES(?,?,?,?,?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $prod->__GET('id_comunidad'),
                    $prod->__GET('id_cat_producto'),
                    $prod->__GET('nombre'),
                    $prod->__GET('descripcion'),
                    $prod->__GET('cantidad'),
                    $prod->__GET('preciov_sugerido'),
                    $prod->__GET('estado')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getProdByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_productos WHERE id_producto = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Productos();

			$u->__SET('id_producto', $r->id_producto);
			$u->__SET('id_comunidad', $r->id_comunidad);
			$u->__SET('id_cat_producto', $r->id_cat_producto);
			$u->__SET('nombre', $r->nombre);
			$u->__SET('descripcion', $r->descripcion);
			$u->__SET('cantidad', $r->cantidad);
			$u->__SET('preciov_sugerido', $r->preciov_sugerido);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function editprod(Tbl_Productos $prod)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_productos SET 
			id_comunidad = ?, 
			id_cat_producto = ?, 
			nombre = ?, 
			descripcion = ?, 
			cantidad = ?, 
			preciov_sugerido = ? 
			estado = ?
			WHERE ; id_producto = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$prod->__GET('id_comunidad'),
						$prod->__GET('id_cat_producto'),
						$prod->__GET('nombre'),
						$prod->__GET('descripcion'),
						$prod->__GET('cantidad'),
						$prod->__GET('preciov_sugerido'),
						$prod->__GET('estado'),
						$prod->__GET('id_producto')
					)
				);

			$this->myCon = parent::desconectar();
		

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

}
