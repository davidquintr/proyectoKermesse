<?php
include_once("conexion.php");
include_once("../../entidades/tbl_lista_precio.php");
include_once("../../entidades/vw_listaprecio.php");


class Dt_tbl_lista_precio extends Conexion
{
    private $myCon;

    public function listarPrecio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_listaprecio;";

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
	public function listarVwPrecio(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.vw_listaprecio;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Vw_listaprecio();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id', $r->id);
                $c->__SET('kermesse', $r->kermesse);
				$c->__SET('producto', $r->producto);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('descripcion', $r->descripcion);
				$c->__SET('precio_venta', $r->precio_venta);
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

	public function insertarlistprecio(Tbl_Lista_Precio $arq){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_listaprecio (id_kermesse, nombre, descripcion, estado)
                VALUES(?,?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $arq->__GET('id_kermesse'),
                    $arq->__GET('nombre'),
                    $arq->__GET('descripcion'),
                    $arq->__GET('estado')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getListPByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_listaprecio WHERE id_lista_precio = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Lista_Precio();

			$u->__SET('id_lista_precio', $r->id_lista_precio);
            $u->__SET('id_kermesse', $r->id_kermesse);
			$u->__SET('nombre', $r->nombre);
			$u->__SET('descripcion', $r->descripcion);
            $u->__SET('estado', $r->estado);
			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function editListprecio(Tbl_Lista_Precio $ac){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_listaprecio SET
						id_kermesse = ?,
						nombre = ?, 
						descripcion = ?, 
						estado = ?
				    WHERE (id_lista_precio = ?)";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$ac->__GET('id_kermesse'),
						$ac->__GET('nombre'),
						$ac->__GET('descripcion'),
						$ac->__GET('estado'),
						$ac->__GET('id_lista_precio')
					)
				);

			$this->myCon = parent::desconectar();
		

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteListPrecio($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_listaprecio SET
						estado = 3
				    WHERE (id_lista_precio = ?)";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}


}
