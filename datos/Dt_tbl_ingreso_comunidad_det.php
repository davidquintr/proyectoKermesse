<?php
include_once("conexion.php");
include_once("../../entidades/tbl_ingreso_comunidad_det.php");


class Dt_tbl_ingreso_comunidad_det extends Conexion
{
    private $myCon;

    public function listarIngresoComunidadDet(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_ingreso_comunidad_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Ingreso_Comunidad_Det();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
				$c->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
				$c->__SET('id_bono', $r->id_bono);
				$c->__SET('denominacion', $r->denominacion);
				$c->__SET('cantidad', $r->cantidad);
				$c->__SET('subtotal_bono', $r->subtotal_bono);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insertarIngreComunidadDet(Tbl_Ingreso_Comunidad_Det $ingComDet){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_ingreso_comunidad_det (id_ingreso_comunidad, id_bono, denominacion, cantidad, subtotal_bono)
                VALUES(?,?,?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $ingComDet->__GET('id_ingreso_comunidad'),
                    $ingComDet->__GET('id_bono'),
                    $ingComDet->__GET('denominacion'),
                    $ingComDet->__GET('cantidad'),
					$ingComDet->__GET('subtotal_bono')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getIngresoDetByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_ingreso_comunidad_det WHERE id_ingreso_comunidad = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Arqueocaja_Det();

			$u->__SET('id_ingreso_comunidad_det', $r->id_ingreso_comunidad_det);
			$u->__SET('id_ingreso_comunidad', $r->id_ingreso_comunidad);
			$u->__SET('id_bono', $r->id_bono);
			$u->__SET('denominacion', $r->denominacion);
			$u->__SET('cantidad', $r->cantidad);
			$u->__SET('subtotal_bono', $r->subtotal_bono);
  
			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editIngresoComDet (Tbl_Ingreso_Comunidad_Det $ac){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_ingreso_comunidad_det SET
						id_ingreso_comunidad = ?,
						id_bono = ?, 
						denominacion = ?,
						cantidad = ?, 
						subtotal_bono = ?
				    WHERE id_ingreso_comunidad_det = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$ac->__GET('id_ingreso_comunidad'),
						$ac->__GET('id_bono'),
						$ac->__GET('denominacion'),
						$ac->__GET('cantidad'),
						$ac->__GET('subtotal_bono')
					)
				);

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