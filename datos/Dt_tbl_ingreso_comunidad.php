<?php
include_once("conexion.php");
include_once("../../entidades/tbl_usuario.php");


class Dt_tbl_ingreso_comunidad extends Conexion
{
    private $myCon;

    public function listarIngresoComunidad(){
		
        try{
            $this->myCon = parent::conectar();
			$result = array();
			$querySQL = "select * from dbkermesse.tbl_ingreso_comunidad;";

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