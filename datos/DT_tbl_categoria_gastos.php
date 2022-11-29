<?php
include_once("conexion.php");
include_once("{$direct}entidades/tbl_categoria_gastos.php");


class Dt_tbl_categoria_gastos extends Conexion
{
    private $myCon;

    public function listarCatGastos(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_categoria_gastos;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_categoria_gastos();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_categoria_gastos', $r->id_categoria_gastos);
				$c->__SET('nombre_categoria', $r->nombre_categoria);
				$c->__SET('descripcion', $r->descripcion);
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

	public function insertarCatGastos(Tbl_categoria_gastos $catGastos){
		try {
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO dbkermesse.tbl_categoria_gastos (nombre_categoria, descripcion, estado)
					VALUES(?,?,?)";

			$this->myCon->prepare($sql)->execute(
				array(
                    $catGastos->__GET('nombre_categoria'),
					$catGastos->__GET('descripcion'),
                    $catGastos->__GET('estado'),
				)
			);

			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getCatGastosByID($id)
	{
		try {
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM dbkermesse.tbl_categoria_gastos WHERE id_categoria_gastos = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));

			$r = $stm->fetch(PDO::FETCH_OBJ);
			$u = new Tbl_categoria_gastos();

			$u->__SET('id_categoria_gastos', $r->id_categoria_gastos);
			$u->__SET('nombre_categoria', $r->nombre_categoria);
            $u->__GET('descripcion', $r->descripcion);
			$u->__SET('estado', $r->estado);

			$this->myCon = parent::desconectar();
			return $u;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function editCatGastos(Tbl_categoria_gastos $tr){
		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
						nombre_categoria = ?,
                        descripcion = ?,
						estado = ?
				    WHERE id_categoria_gastos = ?";

			$this->myCon->prepare($sql)
				->execute(
					array(
						$tr->nombre_categoria,
						$tr->descripcion,
						$tr->estado,
						$tr->id_categoria_gastos
					)
				);
				
			$this->myCon = parent::desconectar();

		} catch (Exception $e) {
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function deleteCatGastos($id){

		try {
			$this->myCon = parent::conectar();
			$sql = "UPDATE dbkermesse.tbl_categoria_gastos SET
						estado = 3
				    WHERE id_categoria_gastos = ?";

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
$prueba = new Dt_tbl_categoria_gastos();
$element = $prueba->listarCatGastos();

foreach($element as $value){
    echo "<br>";
    echo $value->id_categoria_gastos;
    echo $value->nombre_categoria;
    echo $value->descripcion;
    echo $value->estado;
}
*/