<?php
include_once("conexion.php");
include_once("../../entidades/tbl_rol.php");


class Dt_tbl_rol extends Conexion
{
    private $myCon;

    public function listarRoles(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_rol where estado <> 3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Rol();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol', $r->id_rol);
                $c->__SET('rol_descripcion', $r->rol_descripcion);
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

	public function insertarRol(Tbl_Rol $rol){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_rol (rol_descripcion, estado)
					VALUES(?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$rol->__GET('rol_descripcion'),
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
			$querySQL = "SELECT * FROM dbkermesse.tbl_rol WHERE id_rol = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Rol();

			$u->__SET('id_rol', $r->id_rol);
			$u->__SET('rol_descripcion', $r->rol_descripcion);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editRol(Tbl_Rol $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_rol SET
						rol_descripcion = ?,
						estado = ?
				    WHERE id_rol = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->rol_descripcion,
						$tr->estado,
						$tr->id_rol
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteRol($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_rol SET
						estado = 3
				    WHERE id_rol = ?";

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
$prueba = new Dt_tbl_rol();
$element = $prueba->listarRoles();

foreach($element as $value){
    echo "<br>";
    echo $value->id_rol;
	echo $value->rol_descripcion;
	echo $value->estado;
}
*/