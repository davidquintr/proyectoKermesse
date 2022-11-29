<?php

include_once("../entidades/tbl_moneda.php");
include_once("../datos/Dt_tbl_moneda.php");
$direct = "../";

$moneda = new Tbl_moneda();
$dtMoneda = new Dt_tbl_moneda();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $moneda->__SET('nombre', $_POST['monname']);
                $moneda->__SET('simbolo', $_POST['monsim']);
                $moneda->__SET('estado', 1);
                $dtMoneda->insertarMoneda($moneda);

                header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {
                $moneda->__SET('id_moneda', $_POST['idU']);
                $moneda->__SET('nombre', $_POST['monname']);
                $moneda->__SET('simbolo', $_POST['monsim']);
                $moneda->__SET('estado', 2);
                $dtMoneda->editMoneda($moneda);

                header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $moneda->__SET('id_moneda', $_GET['delMo']);
        $dtMoneda->deleteMoneda($moneda->__GET('id_moneda'));
        header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/moneda/gestionar.php?msj=4");
        die($e->getMessage());
    }
}