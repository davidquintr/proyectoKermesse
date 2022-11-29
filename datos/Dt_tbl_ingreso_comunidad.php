<?php
include_once("conexion.php");
include_once("../../entidades/tbl_ingreso_comunidad.php");
include_once("../../entidades/vw_ingresocomunidad.php");

class Dt_tbl_ingreso_comunidad extends Conexion
{
    private $myCon;
	public function listarVwIngresoComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.vw_ingreso_comunidad;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Ingreso_Comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id', $r->id);
				$c->__SET('kermesse', $r->kermesse);
				$c->__SET('comunidad', $r->comunidad);
				$c->__SET('producto', $r->producto);
				$c->__SET('bono', $r->bono);
				$c->__SET('denominacion', $r->denominacion);
				$c->__SET('cantidad', $r->cantidad);
				$c->__SET('subtotal_bono', $r->subtotal_bono);
				$c->__SET('cant_productos', $r->cant_productos);
				$c->__SET('total_bonos', $r->total_bonos);
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



    public function listarIngresoComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Ingreso_Comunidad();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
				$c->__SET('id_kermesse', $r->id_kermesse);
				$c->__SET('id_comunidad', $r->id_comunidad);
				$c->__SET('id_producto', $r->id_producto);
				$c->__SET('cant_productos', $r->cant_productos);
				$c->__SET('total_bonos', $r->total_bonos);
				$c->__SET('estado', $r->estado);
				$c->__SET('usuario_creacion', $r->usuario_creacion);
				$c->__SET('fecha_creacion', $r->fecha_creacion);
				$c->__SET('usuario_modificacion', $r->usuario_modificacion);
				$c->__SET('fecha_modificacion', $r->fecha_modificacion);
				$c->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$c->__SET('fecha_eliminacion', $r->fecha_eliminacion);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarIngresoCom(Tbl_Ingreso_Comunidad $ingCom){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad (id_ingreso_comunidad, id_kermesse, id_comunidad, id_producto, cant_productos, total_bonos, estado, usuario_creacion, fecha_creacion) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $ingCom->__GET('id_ingreso_comunidad'),
                    $ingCom->__GET('id_kermesse'),
                    $ingCom->__GET('id_comunidad'),
                    $ingCom->__GET('id_producto'),
                    $ingCom->__GET('cant_productos'),
                    $ingCom->__GET('total_bonos'),
					$ingCom->__GET('estado'),
					$ingCom->__GET('usuario_creacion'),
					$ingCom->__GET('fecha_creacion')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function getArqueoByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad WHERE id_kermesse = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Ingreso_Comunidad();

			$u->__SET('id_kermesse', $r->id_kermesse);
			$u->__SET('id_comunidad', $r->id_comunidad);
			$u->__SET('id_producto', $r->id_producto);
			$u->__SET('cant_productos', $r->cant_productos);
			$u->__SET('total_bonos', $r->total_bonos);
			$u->__SET('estado', $r->estado);
			$u->__SET('usuario_creacion', $r->usuario_creacion);
			$u->__SET('fecha_creacion', $r->fecha_creacion);
			$u->__SET('usuario_modificacion', $r->usuario_modificacion);
			$u->__SET('fecha_modificacion', $r->fecha_modificacion);
			$u->__SET('usuario_eliminacion', $r->usuario_eliminacion);
			$u->__SET('fecha_eliminacion', $r->fecha_eliminacion);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function editIngresoComunidad(Tbl_Ingreso_Comunidad $ac){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_ingreso_comunidad SET
						id_kermesse = ?,
						id_comunidad = ?,
						id_producto = ?,
						cant_productos = ?,
						total_bonos = ?,
						usuario_modificacion = ?, 
						fecha_modificacion = ?, 
						estado = ?
				    WHERE id_ingreso_comunidad = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$ac->__GET('idKermesse'),
						$ac->__GET('id_comunidad'),
						$ac->__GET('id_producto'),
						$ac->__GET('cant_productos'),
						$ac->__GET('total_bonos'),
						$ac->__GET('usuario_modificacion'),
						$ac->__GET('fecha_modificacion'),
						$ac->__GET('estado'),
						$ac->__GET('id_ingreso_comunidad')
					)
				);

			$this->myCon = parent::desconectar();
		

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

    public function deleteIngresoCom($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_ingreso_comunidad SET
						estado = 3
				    WHERE id_ingreso_comunidad = ?";

			$stm = $this->myCon->prepare($sql);
			$stm->execute(array($id));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}


}
