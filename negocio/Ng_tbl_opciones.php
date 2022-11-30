<?php

include_once("../entidades/tbl_opciones.php");
include_once("../datos/Dt_tbl_opciones.php");

$opc = new Tbl_Opciones();
$dtOpc = new Dt_tbl_opciones();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $opc->__SET('opcion_descripcion', $_POST['opcname']);
                $opc->__SET('estado', 1);
               
                $dtOpc->insertarOpcion($opc);
                header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case 2:
            try {
                $opc->__SET('id_opciones', $_POST['idOpc']);
                $opc->__SET('opcion_descripcion', $_POST['opcname']);
                $opc->__SET('estado', 2);
                $dtOpc->editOpcion($opc);

                header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=3");
            } catch (Exception $e) {

                header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=4");
                die($e->getMessage());

            }

            break;
    }
}

if ($_GET) {
    try {
        $opc->__SET('id_opciones', $_GET['delOc']);
        $dtOpc->deleteOpc($opc->__GET('id_opciones'));
        header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/opciones/gestionar.php?msj=4");
        die($e->getMessage());

    }
}