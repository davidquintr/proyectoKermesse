<?php
$direct = "../";

include_once("../entidades/tbl_arqueocaja.php");
include_once("../datos/Dt_tbl_arqueocaja.php");
include_once("../entidades/tbl_arqueocaja_det.php");
include_once("../datos/Dt_tbl_arqueocaja_det.php");

$arqueoCaja = new Tbl_Arqueocaja();
$arqueoCajaDet = new Tbl_Arqueocaja_Det();

$dtArq = new Dt_tbl_Arqueocaja();
$dtArqDet = new Dt_Tbl_arqueocaja_det();

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $arqueoCaja->__SET('idKermesse', $_POST['kermesse']);
                $arqueoCaja->__SET('fechaArqueo', $date);
                $arqueoCaja->__SET('estado',1);
                $arqueoCaja->__SET('usuario_creacion', 1);
                $arqueoCaja->__SET('fecha_creacion', $date);
                $arqueoCaja->__SET('granTotal', 0.0);
                $dtArq->insertarArqueo($arqueoCaja);

                $allArq = $dtArq->listarArqueoCaja();
                $arqueoCajaDet->__SET('idArqueoCaja',$allArq[count($allArq) - 1]->__GET('id_ArqueoCaja'));
                $arqueoCajaDet->__SET('idMoneda', $_POST['moneda']);
                $arqueoCajaDet->__SET('idDenominacion', $_POST['denom']);
                $arqueoCajaDet->__SET('cantidad', $_POST['cantidad']);
                $arqueoCajaDet->__SET('subtotal', 0.0);
                $dtArqDet->insertarArqCajaDet($arqueoCajaDet);

                header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;
        case 2:
            try {
                $arqueoCaja->__SET('id_ArqueoCaja',$_POST['idArq']);
                $arqueoCaja->__SET('idKermesse', $_POST['kermesse']);
                $arqueoCaja->__SET('estado',2);
                $arqueoCaja->__SET('usuario_modificacion', 1);
                $arqueoCaja->__SET('fecha_modificacion', $date);
                $dtArq->editArqueoCaja($arqueoCaja);

                $arqueoCajaDet = $dtArqDet->getArqueoDetByID($arqueoCaja->id_ArqueoCaja);
                $arqueoCajaDet->__SET('idMoneda', $_POST['moneda']);
                $arqueoCajaDet->__SET('idDenominacion', $_POST['denom']);
                $arqueoCajaDet->__SET('cantidad', $_POST['cantidad']);
                $arqueoCajaDet->__SET('subtotal', 0.0);
                $dtArqDet->editArqueoCajaDet($arqueoCajaDet);               

                header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=3");
            } catch (Exception $e) {

                header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $arqueoCaja->__SET('id_ArqueoCaja', $_GET['delAc']);
        $dtArq->deleteArqueo($arqueoCaja->__GET('id_ArqueoCaja'));
        header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/arqueocaja/gestionar.php?msj=4");
        die($e->getMessage());
    }
}