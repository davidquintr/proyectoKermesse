<?php
include_once("conexion.php");
include_once("../entidades/tbl_categoria_producto.php");


class Dt_tbl_categoria_producto extends Conexion
{
    private $myCon;

    public function listarCatProducto(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_producto;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new tbl_Categoria_Producto();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_categoria_producto', $r->id_categoria_producto);
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

	public function insertarCatProductos(Tbl_Categoria_Producto $prod){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_categoria_producto (nombre,descripcion, estado)
                VALUES(?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $prod->__GET('nombre'),
                    $prod->__GET('descripcion'),
                    $prod->__GET('estado')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}



}