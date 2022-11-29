<?php
include_once("conexion.php");
include_once("../../entidades/tbl_denominacion.php");
include_once("../../entidades/vw_denominacion.php");


class Dt_tbl_Denominacion extends Conexion{
    private $myCon;

    public function listarDenominaciones(){
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_denominacion; ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$c = new Tbl_Denominacion();

				//_SET(CAMPOBD, atributoEntidad)			
				$c->__SET('id_denominacion', $r->id_Denominacion);
                $c->__SET('idMoneda', $r->idMoneda);
                $c->__SET('valor', $r->valor);
                $c->__SET('valor_letras', $r->valor_letras);
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

    public function listarVwDenominaciones(){
        try{
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "select * from dbkermesse.vw_denominacion; ";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $c = new Vw_denominacion();

                //_SET(CAMPOBD, atributoEntidad)          
                $c->__SET('id', $r->id);
                $c->__SET('moneda', $r->moneda);
                $c->__SET('valor', $r->valor);
                $c->__SET('valor_letras', $r->valor_letras);
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

    public function insertarDenominacion(Tbl_Denominacion $den){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "INSERT INTO dbkermesse.tbl_denominacion (idMoneda, valor, valor_letras, estado) VALUES (?,?,?,?);";

            $this->myCon->prepare($querySQL)
            ->execute(
                array(
                    $den->__GET('idMoneda'),
                    $den->__GET('valor'),
                    $den->__GET('valor_letras'),
                    $den->__GET('estado')
                )
            );
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function editDenominacion(Tbl_Denominacion $den){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_denominacion SET idMoneda = ?, valor = ?, valor_letras = ?, estado = ? WHERE id_Denominacion = ?;";

            $this->myCon->prepare($querySQL)
            ->execute(
                array(
                    $den->__GET('idMoneda'),
                    $den->__GET('valor'),
                    $den->__GET('valor_letras'),
                    $den->__GET('estado'),
                    $den->__GET('id_denominacion')
                )
            );
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e){
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function deleteDenominacion($id){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_denominacion SET estado = 3 WHERE id_Denominacion = ?;";

            $this->myCon->prepare($querySQL)->execute(array($id));
            $this->myCon = parent::desconectar();
        }
        catch(Exception $e){
            var_dump($e);
            die($e->getMessage());
        }
    }

    public function getDenominacion($id){
        try{
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_denominacion WHERE id_Denominacion = ?;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $c = new Tbl_Denominacion();

            $c->__SET('id_denominacion', $r->id_Denominacion);
            $c->__SET('idMoneda', $r->idMoneda);
            $c->__SET('valor', $r->valor);
            $c->__SET('valor_letras', $r->valor_letras);
            $c->__SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $c;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}