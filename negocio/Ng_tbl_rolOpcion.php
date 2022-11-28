<?php

include_once("../entidades/rol_opciones.php");
include_once("../datos/Dt_rol_opciones.php");

$opc = new Rol_Opciones();
$dtOpc = new Dt_rol_opciones();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $opc->__SET('tbl_rol_id_rol', $_POST['rol']);
                $opc->__SET('tbl_opciones_id_opciones', $_POST['opcion']);

                $dtOpc->insertarRolOpcion($opc);
                header("Location: /proyectoKermesse/navigate/rolOpciones/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/rolOpciones/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;
    }
}

if ($_GET) {
    try {
        $opc->__SET('id_rol_opciones', $_GET['delOp']);
        $dtOpc->deleteRolOpc($opc->__GET('id_rol_opciones'));
        header("Location: /proyectoKermesse/navigate/rolOpciones/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/rolOpciones/gestionar.php?msj=4");
        die($e->getMessage());

    }
}