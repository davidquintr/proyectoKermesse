<?php
include_once("conexion.php");
include_once("../../entidades/tbl_moneda.php");


class Dt_tbl_Moneda extends Conexion{
    private $myCon;
    public function listarMonedas(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_moneda;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Moneda();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_moneda', $r->id_moneda);
                $c->__SET('nombre', $r->nombre);
                $c->__SET('simbolo', $r->simbolo);
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

	public function insertarMoneda(Tbl_Moneda $data){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "INSERT INTO dbkermesse.tbl_moneda (nombre, simbolo, estado) VALUES (?,?,?);";

			$this->myCon->prepare($querySQL)
			->execute(
				array(
					$data->__GET('nombre'),
					$data->__GET('simbolo'),
					$data->__GET('estado')
				)
			);
			$this->myCon = parent::desconectar();
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function editMoneda(Tbl_Moneda $data){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE dbkermesse.tbl_moneda SET nombre = ?, simbolo = ?, estado = ? WHERE id_moneda = ?;";

			$this->myCon->prepare($querySQL)
			->execute(
				array(
					$data->__GET('nombre'),
					$data->__GET('simbolo'),
					$data->__GET('estado'),
					$data->__GET('id_moneda')
				)
			);
			$this->myCon = parent::desconectar();
		}
		catch(Exception $e){
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteMoneda($id){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE dbkermesse.tbl_moneda SET estado = 3 WHERE id_moneda = ?;";

			$this->myCon->prepare($querySQL)->execute(array($id));
			$this->myCon = parent::desconectar();
		}
		catch(Exception $e){
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function getMoneda($id){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_moneda WHERE id_moneda = ?;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$c = new Tbl_Moneda();

			$c->__SET('id_moneda', $r->id_moneda);
			$c->__SET('nombre', $r->nombre);
			$c->__SET('simbolo', $r->simbolo);
			$c->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $c;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}