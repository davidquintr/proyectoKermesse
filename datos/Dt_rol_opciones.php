<?php
include_once("conexion.php");
include_once("{$direct}entidades/rol_opciones.php");
include_once("{$direct}entidades/vw_rolopcion.php");


class Dt_rol_opciones extends Conexion
{
    private $myCon;

    public function listarRolOpciones(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.rol_opciones;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Rol_Opciones();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_rol_opciones', $r->id_rol_opciones);
                $c->__SET('tbl_rol_id_rol', $r->tbl_rol_id_rol);
                $c->__SET('tbl_opciones_id_opciones', $r->tbl_opciones_id_opciones);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function listarRolOpView(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.vw_rolopcion;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Vw_rolopcion();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id', $r->id);
				$c->__SET('idRol', $r->idRol);
                $c->__SET('idOpc', $r->idOpc);
                $c->__SET('rol', $r->rol);
                $c->__SET('opcion', $r->opcion);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function getOpc($idRol, $opcion){
		try{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.vw_rolopcion where IdRol = :idRol and opcion = :opcion;";

			$stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':idRol', $idRol, PDO::PARAM_INT);
			$stm->bindParam(':opcion', $opcion, PDO::PARAM_STR,40);
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

	public function insertarRolOpcion(Rol_Opciones $opc){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.rol_opciones (tbl_rol_id_rol, tbl_opciones_id_opciones)
					VALUES(?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
					$opc->__GET('tbl_rol_id_rol'),
					$opc->__GET('tbl_opciones_id_opciones'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function deleteRolOpc($idRolOpc){
		try{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM dbkermesse.rol_opciones where id_rol_opciones = :idRolOpc";

			$stm = $this->myCon->prepare($querySQL);
            $stm->bindParam(':idRolOpc', $idRolOpc, PDO::PARAM_INT);
			$stm->execute();
			$this->myCon = parent::desconectar();
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}



}
/*
$prueba = new Dt_rol_opciones();
$element = $prueba->listarRolOpView();

foreach($element as $value){
    echo "<br>";
    echo $value->idRol;
    echo $value->idOpc;
    echo $value->rol;
    echo $value->opcion;
}*/
