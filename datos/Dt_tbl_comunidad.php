<?php
include_once("conexion.php");
include_once("../../entidades/tbl_comunidad.php");


class Dt_tbl_comunidad extends Conexion
{
    private $myCon;

    public function listarComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_comunidad where estado <> 3; ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_comunidad', $r->id_comunidad);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('responsable', $r->responsable);
				$c->__SET('desc_contribucion', $r->desc_contribucion);
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

	public function insertarComunidad(Tbl_Comunidad $comunidad){
		try {
			$this->myCon = parent::conectar();
			
			$sql = "INSERT INTO dbkermesse.tbl_comunidad (nombre, responsable, desc_contribucion, estado) VALUES (?, ?, ?, ?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$comunidad->__GET('nombre'),
					$comunidad->__GET('responsable'),
					$comunidad->__GET('desc_contribucion'),
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
			$querySQL = "SELECT * FROM dbkermesse.tbl_comunidad WHERE id_comunidad = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Comunidad();

			$u->__SET('id_comunidad', $r->id_comunidad);
			$u->__SET('nombre', $r->nombre);
			$u->__SET('responsable', $r->responsable);
			$u->__SET('desc_contribucion', $r->desc_contribucion);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editComunidad(Tbl_Comunidad $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_comunidad SET
						nombre = ?,
						responsable = ?,
						desc_contribucion = ?,
						estado = ?
				    WHERE id_comunidad = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->nombre,
						$tr->responsable,
						$tr->desc_contribucion,
						$tr->estado,
						$tr->id_comunidad
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteComunidad($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_comunidad SET
						estado = 3
				    WHERE id_comunidad = ?";

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