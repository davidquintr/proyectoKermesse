<?php
include_once("conexion.php");
include_once("{$direct}entidades/rol_usuario.php");
include_once("{$direct}entidades/vw_rolusuario.php");


class Dt_rol_usuario extends Conexion
{
    private $myCon;

    public function listarRolUsuarios(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Rol_Usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol_usuario', $r->id_rol_usuario);
                $c->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
                $c->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
    public function listarVwRolUsuario(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.vw_rolusuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Vw_rolopcion();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id', $r->Id);
                $c->__SET('usuario', $r->Usuario);
                $c->__SET('nombre', $r->Nombre);
                $c->__SET('rol', $r->Rol);
                $result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function getIdRol($userId){
		try{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT tbl_rol_id_rol FROM dbkermesse.rol_usuario Where tbl_usuario_id_usuario = :idUser;";

			$stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':idUser', $userId, PDO::PARAM_INT);
			$stm->execute();

            $result = $stm->fetchColumn(0);

			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function hasRol($id){
		try{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.vw_rolusuario where Id = :id;";

			$stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
			$stm->execute();
            $result = $stm->fetchColumn(0);
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function insertarRolUsuario(Rol_Usuario $rolUsr){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.rol_usuario (tbl_usuario_id_usuario, tbl_rol_id_rol)
					VALUES(?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$rolUsr->__GET('tbl_usuario_id_usuario'),
					$rolUsr->__GET('tbl_rol_id_rol'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	
	public function getRolUsrById($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.rol_usuario WHERE id_rol_usuario = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Rol_Usuario();

			$u->__SET('id_rol_usuario', $r->id_rol_usuario);
			$u->__SET('tbl_usuario_id_usuario', $r->tbl_usuario_id_usuario);
			$u->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editRolUsr(Rol_Usuario $rolUsr){
		try {

			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.rol_usuario SET
						tbl_usuario_id_usuario = ?, 
						tbl_rol_id_rol = ?
				    WHERE id_rol_usuario = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$rolUsr->__GET('tbl_usuario_id_usuario'),
						$rolUsr->__GET('tbl_rol_id_rol'),
						$rolUsr->__GET('id_rol_usuario')
					)
				);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteRolUsr($idRolUsr){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM dbkermesse.rol_usuario where id_rol_usuario = :idRolUsr";
			$stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':idRolUsr', $idRolUsr, PDO::PARAM_INT);
			$stm->execute();
			$this->myCon = parent::desconectar();
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}
/*
$prueba = new Dt_rol_usuario();
$element = $prueba->listarRolUsuario();

foreach($element as $value){
    echo "<br>";
    echo $value->id_rol_usuario;
    echo $value->tbl_usuario_id_usuario;
    echo $value->tbl_rol_id_rol;
}
*/