<?php
include_once("conexion.php");
include_once("../entidades/tbl_gastos.php");


class Dt_tbl_gastos extends Conexion
{
    private $myCon;

    public function listarVwGastos()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.vw_gastos;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $c = new Vw_gastos();
		
                $c->__SET('id', $r->id);
                $c->__SET('kermesse', $r->kermesse);
                $c->__SET('categoria', $r->categoria);
                $c->__SET('fecha', $r->fecha);
                $c->__SET('concepto', $r->concepto);
                $c->__SET('monto', $r->monto);
                $c->__SET('estado', $r->estado);
                $result[] = $c;
            }
            $this->myCon = parent::desconectar();
            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_gastos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_registro_gastos', $r->id_registro_gastos);
                $c->__SET('idKermesse', $r->idKermesse);
				$c->__SET('idCatGastos', $r->idCatGastos);
				$c->__SET('fechaGasto', $r->fechaGasto);
				$c->__SET('concepto', $r->concepto);
				$c->__SET('monto', $r->monto);
				$c->__SET('usuario_creacion', $r->usuario_creacion);
				$c->__SET('fecha_creacion', $r->fecha_creacion);
                $c->__SET('usuario_modificacion', $r->usuario_modificacion);
                $c->__SET('fecha_modificacion', $r->fecha_modificacion);
                $c->__SET('usuario_eliminacion', $r->usuario_eliminacion);
                $c->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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

    public function insertarGastos(Tbl_gastos $gastos){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_gastos (idKermesse, idCatGastos, fechaGasto, concepto, monto, usuario_creacion, fecha_creacion, estado)
					VALUES(?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
                    $gastos->__GET('idKermesse'),
					$gastos->__GET('idCatGastos'),
                    $gastos->__GET('fechaGasto'),
                    $gastos->__GET('concepto'),
                    $gastos->__GET('monto'),
                    $gastos->__GET('usuario_creacion'),
                    $gastos->__GET('fecha_creacion'),
                    $gastos->__GET('estado'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getGastosByID($id)
	{
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_gastos WHERE id_registro_gastos = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_gastos();

			$u->__SET('id_registro_gastos', $r->id_registro_gastos);
			$u->__SET('idKermesse', $r->idKermesse);
            $u->__GET('idCatGastos', $r->idCatGastos);
            $u->__GET('fechaGasto', $r->fechaGasto);
            $u->__GET('concepto', $r->concepto);
            $u->__GET('monto', $r->monto);
            $u->__GET('monto', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editGastos(Vw_gastos $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_kermesse SET
						kermesse = ?,
                        categoria = ?,
                        fecha = ?,
						concepto,
						estado = ?
				    WHERE id = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->kermesse,
						$tr->categoria,
						$tr->fecha,
						$tr->concepto,
						$tr->estado,
						$tr->id
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteGastos($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_gastos SET
						estado = 3
				    WHERE id_registro_gatos = ?";

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
$prueba = new Dt_tbl_gastos();
$element = $prueba->listarGastos();

foreach($element as $value){
    echo "<br>";
    echo $value->id_registro_gastos;
    echo $value->idKemesse;
    echo $value->idCatGastos;
    echo $value->fechaGasto;
    echo $value->concepto;
    echo $value->monto;
    echo $value->usuario_creacion;
    echo $value->fecha_creacion;
    echo $value->usuario_modificacion;
    echo $value->fecha_modificacion;
    echo $value->usuario_eliminacion;
    echo $value->fecha_eliminacion;
}
*/