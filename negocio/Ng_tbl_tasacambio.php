<?php
$direct = "../";

include_once("../entidades/tbl_tasacambio.php");
include_once("../entidades/tbl_usuario.php");
include_once("../datos/Dt_tbl_tasacambio.php");
include_once("../entidades/Tasacambio_det.php");
include_once("../datos/Dt_tbl_tasacambio_det.php");

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=4");
} 

$usuario = $_SESSION['acceso'];

$tasacambio = new Tbl_TasaCambio();
$tasacambioDet = new Tasacambio_Det();

$dtTascam = new Dt_tbl_tasacambio();
$dtTascamDet = new Dt_Tbl_tasacambio_det();

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $tasacambio->__SET('id_monedaO', $_POST['monedaO']);
                $tasacambio->__SET('id_monedaC', $_POST['monedaC']);
                $tasacambio->__SET('mes', $_POST['mes']);
                $tasacambio->__SET('anio', $_POST['anio']);
                $tasacambio->__SET('estado',1);
                $dtTascam->insertarTasaCambio($tasacambio);

                $allTascam = $dtTascam->listarTasaCambio();
                $tasacambioDet->__SET('id_tasaCambio',$allTascam[count($allTascam) - 1]->__GET('id_tasaCambio'));
                $tasacambioDet->__SET('tipoCambio', $_POST['tipoCambio']);
                $tasacambioDet->__SET('fecha', $date);
                $dtTascamDet->insertarTasaCambio_det($tasacambioDet);

                header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;
        case 2:
            try {
                $tasacambio->__SET('id_tasaCambio', $_POST['idTascam']);
                $tasacambio->__SET('id_monedaO', $_POST['monedaO']);
                $tasacambio->__SET('id_monedaC', $_POST['monedaC']);
                $tasacambio->__SET('mes', $_POST['mes']);
                $tasacambio->__SET('anio', $_POST['anio']);
                $tasacambio->__SET('estado',1);
                $dtTascam->editTasaCambio($tasacambio);

                $tasacambioDet = $dtTascamDet->getTasaCambio_det($tasacambio->id_tasaCambio);
                $tasacambioDet->__SET('tipoCambio', $_POST['tipoCambio']);
                $tasacambioDet->__SET('fecha', $date);
                $dtTascamDet->editarTasaCambio_det($tasacambioDet);              

                header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=3");
            } catch (Exception $e) {

                header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $tasacambio->__SET('id_tasaCambio', $_GET['delTa']);
        $dtTascam->deleteTasaCambio($tasacambio->__GET('id_tasaCambio'));
        header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/tasacambio/gestionar.php?msj=4");
        die($e->getMessage());
    }
}