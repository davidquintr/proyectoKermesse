<?php
include_once("conexion.php");
include_once("../entidades/tbl_usuario.php");


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