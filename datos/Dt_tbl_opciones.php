<?php
include_once("conexion.php");
include_once("../../entidades/tbl_opciones.php");


class Dt_tbl_opciones extends Conexion
{
    private $myCon;

    public function listarOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_opciones where estado <> 3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_opciones', $r->id_opciones);
                $c->__SET('opcion_descripcion', $r->opcion_descripcion);
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

	public function insertarOpcion(Tbl_Opciones $opc){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_opciones (opcion_descripcion, estado)
					VALUES(?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$opc->__GET('opcion_descripcion'),
					$opc->__GET('estado'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	public function getOpcByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_opciones WHERE id_opciones = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Opciones();

			$u->__SET('id_opciones', $r->id_opciones);
			$u->__SET('opcion_descripcion', $r->opcion_descripcion);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editOpcion(Tbl_Opciones $to){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_opciones SET
						opcion_descripcion = ?,
						estado = ?
				    WHERE id_opciones = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$to->__GET('opcion_descripcion'),
						$to->__GET('estado'),
						$to->__GET('id_opciones')
					)
				);

			$this->myCon = parent::desconectar();
		

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteOpc($id){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_opciones SET
						estado = 3
				    WHERE id_opciones = ?";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}
}
/*
$prueba = new Dt_tbl_opciones();
$element = $prueba->listarOpciones();

foreach($element as $value){
    echo "<br>";
    echo $value->id_opciones;
    echo $value->opcion_descripcion;
    echo $value->estado;
}
*/