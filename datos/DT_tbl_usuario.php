<?php
include_once("conexion.php");
include_once("../entidades/tbl_usuario.php");


class Dt_tbl_usuario extends Conexion
{
	private $myCon;

	public function listarUsuarios()
	{

		try {
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_usuario;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
				$c = new tbl_usuario();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_usuario', $r->id_usuario);
				$c->__SET('usuario', $r->usuario);
				$c->__SET('pwd', $r->pwd);
				$c->__SET('nombres', $r->nombres);
				$c->__SET('apellidos', $r->apellidos);
				$c->__SET('email', $r->email);
				$c->__SET('estado', $r->estado);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insertarUsuario(tbl_usuario $usr)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_usuario (usuario, pwd, nombres, apellidos, email, estado)
					VALUES(?,?,?,?,?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$usr->__GET('usuario'),
					$usr->__GET('pwd'),
					$usr->__GET('nombres'),
					$usr->__GET('apellidos'),
					$usr->__GET('email'),
					$usr->__GET('estado')
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getUserByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE id_usuario = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new tbl_usuario();

			$u->__SET('id_usuario', $r->id_usuario);
			$u->__SET('usuario', $r->usuario);
			$u->__SET('pwd', $r->pwd);
			$u->__SET('nombres', $r->nombres);
			$u->__SET('apellidos', $r->apellidos);
			$u->__SET('email', $r->email);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editUser(tbl_usuario $tu)
	{
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_usuario SET
						pwd = ?,
						nombres = ?, 
						apellidos = ?, 
						email = ?, 
						estado = ?
				    WHERE id_usuario = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tu->__GET('pwd'),
						$tu->__GET('nombres'),
						$tu->__GET('apellidos'),
						$tu->__GET('email'),
						$tu->__GET('estado'),
						$tu->__GET('id_usuario')
					)
				);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteUser($id)
	{

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_usuario SET
						estado = 3
				    WHERE id_usuario = ?";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function validarUser($user, $pwd){
		try {
			$this->myCon = parent::conectar();

			$querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE usuario=? AND pwd=? AND estado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($user, $pwd));

			$resultado = $stm->fetchAll(PDO::FETCH_CLASS, "tbl_usuario");

			$this->myCon = parent::desconectar();
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


}
/*
$prueba = new Dt_tbl_usuario();
$value = $prueba->getUserByID(1);
echo "<br>";
echo $value->id_usuario;
echo $value->usuario;
echo $value->pwd;
echo $value->nombres;
echo $value->apellidos;
echo $value->email;
echo $value->estado;
*/