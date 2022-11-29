<?php
include_once("../entidades/tbl_ingreso_comunidad.php");
include_once("../datos/Dt_tbl_ingreso_comunidad.php");
include_once("../entidades/tbl_ingreso_comunidad_det.php");
include_once("../datos/Dt_tbl_ingreso_comunidad_det.php");
include_once("../entidades/tbl_usuario.php");

$direct = "../";

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: /proyectoKermesse/navigate/ingresoComunidad/gestionar.php?msj=4");
} 

$usuario = $_SESSION['acceso'];

$ingresoComunidad = new Tbl_Ingreso_Comunidad();
$ingresoComunidadDet = new Tbl_Ingreso_Comunidad_Det();

$dtIngCom = new Dt_tbl_ingreso_comunidad();
$dtIngComDet = new Dt_tbl_ingreso_comunidad_det();

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $ingresoComunidad->__SET('id_kermesse', $_POST['ker']);
                $ingresoComunidad->__SET('id_comunidad', $_POST['comunidad']);
                $ingresoComunidad->__SET('id_producto', $_POST['comunidad']);
                $ingresoComunidad->__SET('cant_productos', $_POST['cantProductos']);
                $ingresoComunidad->__SET('total_bonos', $_POST['totalBonos']);
                $ingresoComunidad->__SET('estado', 1);
                $ingresoComunidad->__SET('usuario_creacion', 1);
                $ingresoComunidad->__SET('fecha_creacion', $date);
                $dtIngCom->insertarIngresoCom($ingresoComunidad);

                $allCom = $dtIngCom->listarIngresoComunidad();

                $ingresoComunidadDet->__SET('id_ingreso_comunidad',$allCom[count($allCom) - 1]->__GET('id_ingreso_comunidad'));
                $ingresoComunidadDet->__SET('id_bono', $_POST['bono']);
                $ingresoComunidadDet->__SET('denominacion', $_POST['denom']);
                $ingresoComunidadDet->__SET('cantidad', $_POST['cantidad']);
                $ingresoComunidadDet->__SET('subtotal_bono', 0.0);
                $dtIngComDet->insertarIngreComunidadDet($ingresoComunidadDet);

                header("Location: /proyectoKermesse/navigate/ingresoComunidad/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/ingresoComunidad/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

            case 2:
                try {
                    $ingresoComunidad->__SET('id_ingreso_comunidad', $_POST['idIng']);
                    $ingresoComunidad->__SET('id_comunidad', $_POST['comunidad']);
                    $ingresoComunidad->__SET('id_producto', $_POST['comunidad']);
                    $ingresoComunidad->__SET('cant_productos', $_POST['cantProductos']);
                    $ingresoComunidad->__SET('total_bonos', $_POST['totalBonos']);
                    $ingresoComunidad->__SET('estado', 1);
                    $ingresoComunidad->__SET('usuario_modificacion', $usuario[0]->id_usuario);
                    $ingresoComunidad->__SET('fecha_modificacion', $date);
                    $ingresoComunidad->id_kermesse = $_POST['ker'];
                    $dtIngCom->editIngCom($ingresoComunidad, $_POST['ker']);
    
                    $ingresoComunidadDet->__SET('id_ingreso_comunidad_det',$dtIngComDet->getIngresoDetByID($ingresoComunidad->id_ingreso_comunidad_det));
                    $ingresoComunidadDet->__SET('id_ingreso_comunidad', $ingresoComunidad->id_ingreso_comunidad);
                    $ingresoComunidadDet->__SET('id_bono', $_POST['bono']);
                    $ingresoComunidadDet->__SET('denominacion', $_POST['denom']);
                    $ingresoComunidadDet->__SET('cantidad', $_POST['cantidad']);
                    $ingresoComunidadDet->__SET('subtotal_bono', 0.0);
                    $dtIngComDet->editIngresoComDet($ingresoComunidadDet);               
    
                    header("Location: /proyectoKermesse/navigate/ingresoComunidadDet/gestionar.php?msj=3");
                } catch (Exception $e) {
    
                    header("Location: /proyectoKermesse/navigate/ingresoComunidadDet/gestionar.php?msj=4");
                    die($e->getMessage());
                }
            break;
    }
}

if ($_GET) {
    try {
        $usr->__SET('id_usuario', $_GET['delU']);
        $dtUsr->deleteUser($usr->__GET('id_usuario'));
        header("Location: /proyectoKermesse/navigate/ingresoComunidad/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/ingresoComunidad/gestionar.php?msj=4");
        die($e->getMessage());

    }
}