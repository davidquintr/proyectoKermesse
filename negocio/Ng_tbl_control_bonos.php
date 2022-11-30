<?php

include_once("../entidades/tbl_control_bonos.php");
include_once("../datos/Dt_tbl_control_bonos.php");
$direct = "../";

$bonos = new Tbl_control_bonos();
$dtbonos = new Dt_tbl_control_bonos();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $bonos->__SET('nombre', $_POST['bonoName']);
                $bonos->__SET('valor', $_POST['valorBono']);
                $bonos->__SET('estado', 1);
                $dtbonos->insertarbonos($bonos);

                header("Location: /proyectoKermesse/navigate/controlBonos/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/controlBonos/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $bonos->__SET('id_bono', $_POST['idBono']);
                $bonos->__SET('nombre', $_POST['bonoName']);
                $bonos->__SET('valor', $_POST['valorBono']);
                $bonos->__SET('estado', 2);
                $dtbonos->editBono($bonos);

                header("Location: /proyectoKermesse/navigate/controlBonos/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/controlBonos/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $bonos->__SET('id_bonos', $_GET['delBonos']);
        $dtbonos->deleteBono($bonos->__GET('id_bonos'));
        header("Location: /proyectoKermesse/navigate/bonos/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/bonos/gestionar.php?msj=4");
        die($e->getMessage());

    }
}