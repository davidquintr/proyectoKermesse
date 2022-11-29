<?php
include_once("conexion.php");


class Dt_tbl_parroquia extends Conexion
{
    private $myCon;

    public function listarParroquia(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_parroquia;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_parroquia();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('idParroquia', $r->idParroquia);
				$c->__SET('nombre', $r->nombre);
				$c->__SET('direccion', $r->direccion);
				$c->__SET('telefono', $r->telefono);
				$c->__SET('parroco', $r->parroco);
				$c->__SET('logo', $r->logo);
				$c->__SET('sitio_web', $r->sitio_web);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarParroquia(Tbl_parroquia $parroquia){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_parroquia (nombre, direccion, telefono, parroco, logo, sitio_web)
					VALUES(?,?,?,?,?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
                    $parroquia->__GET('nombre'),
					$parroquia->__GET('direccion'),
                    $parroquia->__GET('telefono'),
                    $parroquia->__GET('parroco'),
                    $parroquia->__GET('logo'),
					$parroquia->__GET('sitio_web'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getParroquiaByID($id)
	{
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_parroquia WHERE id_parroquia = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_parroquia();

			$u->__SET('id_parroquia', $r->id_parroquia);
			$u->__SET('nombre', $r->nombre);
            $u->__GET('direccion', $r->direccion);
            $u->__GET('telefono', $r->ftelefono);
            $u->__GET('parroco', $r->parroco);
            $u->__GET('logo', $r->logo); 
			$u->__SET('sitio_web', $r->sitio_web);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editParroquia(Tbl_parroquia $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_parroquia SET
						nombre = ?,
                        direccion = ?,
                        telefono = ?,
						parroco = ?,
						logo = ?,
						sitio_web = ?
				    WHERE id_parroquia = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->nombre,
						$tr->direccion,
						$tr->telefono,
						$tr->parroco,
						$tr->logo,
						$tr->sitio_web,
						$tr->id_parroquia
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteParroquia($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_parroquia SET
						estado = 3
				    WHERE id_parroquia = ?";

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
$prueba = new Dt_tbl_parroquia();
$element = $prueba->listarParroquia();

foreach($element as $value){
    echo "<br>";
    echo $value->idParroquia;
    echo $value->nombre;
    echo $value->direccion;
    echo $value->telefono;
    echo $value->parroco;
    echo $value->logo;
    echo $value->sitio_web;
}
*/