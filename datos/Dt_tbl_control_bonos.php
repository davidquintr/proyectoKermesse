<?php
include_once("conexion.php");
include_once("../../entidades/tbl_control_bonos.php");


class Dt_tbl_control_bonos extends Conexion
{
    private $myCon;

    public function listarControlBonos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_control_bonos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Control_Bonos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_bono', $r->id_bono);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('valor', $r->valor);
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

	public function insertarBonos(Tbl_Control_Bonos $bonos){
		try {
			$this->myCon = parent::conectar();

			$sql = "INSERT INTO dbkermesse.tbl_control_bonos (nombre,
			valor, estado) VALUES (?, ?, ?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$bonos->__GET('nombre'),
					$bonos->__GET('valor'),
					1,
				)
			);
	
			$this->myCon = parent::desconectar();
	
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	

	public function getRolByID($id)
	{
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_control_bonos WHERE id_bono = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Control_Bonos();

			$u->__SET('id_bono', $r->id_bono);
			$u->__SET('nombre', $r->nombre);
			$u->__SET('valor', $r->valor);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editBono(Tbl_Control_Bonos $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_control_bonos SET
						nombre = ?,
						valor = ?,
						estado = ?
				    WHERE id_bono = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->nombre,
						$tr->valor,
						$tr->estado,
						$tr->id_bono
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteBono($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_control_bonos SET
						estado = 3
				    WHERE id_bono = ?";

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
$prueba = new Dt_tbl_usuario();
$element = $prueba->listarUsuarios();

foreach($element as $value){
    echo "<br>";
    echo $value->id_usuario;
    echo $value->usuario;
    echo $value->pwd;
    echo $value->nombres;
    echo $value->apellidos;
    echo $value->email;
    echo $value->estado;
}
*/