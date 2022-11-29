<?php
include_once("conexion.php");
include_once("{$direct}entidades/tbl_arqueocaja_det.php");


class Dt_Tbl_arqueocaja_det extends Conexion{
    private $myCon;

    public function listarArqueoCaja_det(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Arqueocaja_Det();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
                $c->__SET('idArqueoCaja', $r->idArqueoCaja);
                $c->__SET('idMoneda', $r->idMoneda);
                $c->__SET('idDenominacion', $r->idDenominacion);
                $c->__SET('cantidad', $r->cantidad);
                $c->__SET('subtotal', $r->subtotal);
				$result[] = $c;
			}
			$this->myCon = parent::desconectar(); 
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

    public function insertarArqCajaDet(Tbl_Arqueocaja_Det $arqCajaDet){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_arqueocaja_det (idArqueoCaja, idMoneda, idDenominacion, cantidad, subtotal)
                VALUES(?,?,?,?,?)";

            $this->myCon->prepare($sql)
                ->execute(array(
                    $arqCajaDet->__GET('idArqueoCaja'),
                    $arqCajaDet->__GET('idMoneda'),
                    $arqCajaDet->__GET('idDenominacion'),
                    $arqCajaDet->__GET('cantidad'),
                    $arqCajaDet->__GET('subtotal')
                ));

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

    public function getArqueoDetByID($id){
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_arqueocaja_det WHERE idArqueoCaja = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_Arqueocaja_Det();

			$u->__SET('idArqueoCaja_Det', $r->idArqueoCaja_Det);
			$u->__SET('idArqueoCaja', $r->idArqueoCaja);
			$u->__SET('idMoneda', $r->idMoneda);
			$u->__SET('idDenominacion', $r->idDenominacion);
			$u->__SET('cantidad', $r->cantidad);
			$u->__SET('subtotal', $r->subtotal);
  
			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editArqueoCajaDet(Tbl_Arqueocaja_Det $ac){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_arqueocaja_det SET
						idMoneda = ?,
						idDenominacion = ?, 
						cantidad = ?, 
						subtotal = ?
				    WHERE idArqueoCaja_Det = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$ac->__GET('idMoneda'),
						$ac->__GET('idDenominacion'),
						$ac->__GET('cantidad'),
						$ac->__GET('subtotal'),
						$ac->__GET('idArqueoCaja_Det')
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
$prueba = new Dt_Tbl_arqueocaja_det();
$element = $prueba->listarArqueoCaja_det();

foreach($element as $value){
    echo "<br>";
    echo $value->idArqueoCaja_Det;
    echo "<br>";
    echo $value->idArqueoCaja;
    echo "<br>";
    echo $value->idMoneda;
    echo "<br>";
    echo $value->idDenominacion;
    echo "<br>";
    echo $value->cantidad;
    echo "<br>";
    echo $value->subtotal;
}*/
